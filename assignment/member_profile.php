<?php
$page_title = 'memberlogin';
include('header.php');
?>
<?php

    require_once('mySqli_connect.php');
    
    $studentID = $_SESSION['studentID'];
    $SHA1studentPswd = $_SESSION['pword'];
    
    $select_q = "SELECT * FROM member WHERE stud_id = '$studentID' AND stud_pswd = '$SHA1studentPswd'";
    $select_r = mysqli_query($dbc,$select_q);

    $num = mysqli_num_rows($select_r);
    if($num == 1)
    {
        $row = mysqli_fetch_array($select_r);
        $studentID = $row['stud_id'];
        $studentName = $row['stud_name'];
        $tarucEmail = $row['stud_taruc_email'];
        $studentGender = $row['stud_gender'];
        $studentPswd = $row['stud_pswd'];
    }
    

    if (!empty($_POST)) 
    {
        $studentName = trim($_POST['name']);
        $tarucEmail = trim($_POST['tarucEmail']);
        $studentGender = trim($_POST['gender']);
        
        if (isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
        }

        $error = array();
        //Name
        if(!preg_match('/^[a-zA-z" ]+$/',$studentName))
        {
            $error['name'] = 'There are invalid characters in your <strong>name<strong>.';
        }

        //Email
        if(!preg_match('/^[a-z]{2,11}-[a-z]{2}\d{2}@student.tarc.edu.my$/',$tarucEmail))
        {
            $error['email'] = '<strong>TAR UC Email Address</strong> is of invalid format';
        }

        //Gender
        if(!preg_match('/^[MF]$/',$studentGender))
        {
            $error['gender'] = '<strong>Gender</strong> cannot be neither M nor F';
        }

        if(empty($error))
        {
            require_once('mySqli_connect.php'); 

            $q = "UPDATE member SET stud_name = '$studentName', stud_taruc_email = '$tarucEmail', stud_gender = '$studentGender'
                  WHERE stud_id = '$studentID'";
            $r = mysqli_query($dbc, $q);

            $num = mysqli_affected_rows($dbc);
            if ($num == 1)
            {
                success();
            }
            else
            {
                fail();
            }
        }
        else
        {
            echo"<ul class = 'error'>";
            foreach ($error as $value)
            {
                echo"<li>$value</li>";
            }
            echo "</ul>";
        }
    }    
    mysqli_close($dbc);
?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="keywords" content="Badminton,Ticket,Events, Bookings"/>
        <title>Profile</title>
        <link href="member_profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link href="bd_styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>        
    </head>
    <style>
        table{
            border-collapse: collapse;
            border: 5px solid darkred;
            border-spacing: 10px;
            margin: 0 auto;
            width: 70%;
        }
        
        th{
            text-align: left;
        }
        
        th,td{
            border-collapse: collapse;
            border: 2px solid darkgreen;
            padding: 10px;
        }
        
        .container{  
        text-align: center;   
        }
        
        #update{  
            font-size: 25px;  
        } 
        input[type='submit']{
            cursor: pointer;
            height: 40px;
            width: 160px;
            margin: 10px 10px;
            background-color: #ebd581;
            border-radius: 20px;
        }
        
        input[type='submit']:hover{
            background-color: rgb(221, 200, 138);
        }

        input[type='submit']:focus:active{
            border: 4px solid darkgoldenrod;
        }
    </style>
    
    <header>
        <?php
            include('member_login_header.php');
        ?>
    </header>
    
    <body>
        <img src="bd_login_image.jpg" alt="Avatar" class="avatar">
        
        <div class="Title">
            <br><h1>Personal Information</h1><br>
        </div>
        
        <?php
        function success()
        {
            echo'<div style="background-color:#6CCA9B">'.
                    '<h1 style="text-align:center;font-size: 2em;">Thank you!</h1>'.
                    '<p style="text-align:center;font-size: 1em;color:black;">The student has been updated successfulty.<br/></p>'.
                '</div>';
        }
        
        function fail()
        {
            echo'<div style="background-color:#6CCA9B">'.
                    '<h1 style="text-align:center;font-size: 2em;">System Error!</h1>'.
                    '<p style="text-align:center;font-size: 1em;color:black;">The student cannot be updated due to a system error.<br/></p>'.
                '</div>';
        }
        ?>
        
        <form action="member_profile.php" method="post">
            <table>
                <tr>
                    <th>Student ID</th> 
                    <td>
                        <?php echo $studentID;?>
                        <input type="hidden" name="id" value="<?php echo $studentID;?>" maxlength="10"/>
                    </td>
                </tr> 
                <tr>
                    <th>Student Name</th> 
                    <td><input type="text" name="name" value="<?php echo $studentName;?>" required/></td>
                </tr> 
                <tr>
                    <th>TARUC Email Address</th>
                    <td><input type="text" name="tarucEmail" value="<?php echo $tarucEmail;?>" required/></td>
                </tr>
                <tr>
                    <th>Gender</th> 
                    <td>
                        Female<input type="radio" name="gender" value="F" <?php if ($studentGender == 'F') {echo 'checked="checked"';}?> required/>
                        Male<input type="radio" name="gender" value="M" <?php if ($studentGender =='M') { echo 'checked="checked"'; }?> required/>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo $studentPswd;?></td>
                </tr>
                
            </table>
            <div  class="container"><input type="submit" id ="update" name="update" value="Update"/></div>
        </form>
    </body>
    
    <br>
    <footer>
        <?php
            include('footer.html');
        ?>
    </footer>


