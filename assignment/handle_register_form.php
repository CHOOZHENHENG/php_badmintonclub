<?php
function detectInputError()
    {
        global $studentID, $name, $email, $gender, $pswd, $confirmPswd;

        $error = array();

        //Student ID
        if(!preg_match('/^\d{2}[A-Z]{3}\d{5}$/',$studentID))
        {
            $error['$studentID'] = '<strong>Student ID<strong> is of invalid format. Format: 99XXX99999.';
        }

        //Name
        if(!preg_match('/^[a-zA-z" ]+$/',$name))
        {
            $error['$name'] = 'There are invalid characters in your <strong>name<strong>.';
        }

        //Email
        if(!preg_match('/^[a-z]{2,11}-[a-z]{2}\d{2}@student.tarc.edu.my$/',$email))
        {
            $error['$email'] = '<strong>TAR UC Email Address</strong> is of invalid format';
        }

        //Gender
        if(!preg_match('/^[MF]$/',$gender))
        {
            $error['$gender'] = '<strong>Gender</strong> cannot be neither M or F';
        }

        //Confirm Password
        if(strcmp($confirmPswd, $pswd) != 0)
        {
            $error['$confirmPswd'] = '<strong>Confirm Password</strong> is not matched with <strong>Password</strong>';
        }

        return $error;
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="windows-1252">
        <title>Form Results</title>
        <link href="reset.css" rel="stylesheet" type="text/css">
        <link href="register.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
    <header>
       <?php
            include('header.html');
        ?>
    </header>
    <body>
    <?php
    if(isset($_POST['submit']))
        {
            $studentID = trim($_POST['studentID']);
            $name = trim($_POST['name']);
            $email = trim($_POST['memberEmail']);
            $gender = trim($_POST['gender']);
            $pswd = trim($_POST['password']);
            $confirmPswd = trim($_POST['confirmPassword']);
            $fullName = $name;
            $fname;
            $lname;
            
            $error = detectInputError();
            
            if (empty($error)) // If there is no error.
            {
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $dateTime = date('d/m/Y H:iA');
                require_once 'mySqli_connect.php';
                $query = "INSERT INTO member (stud_id,stud_name,stud_taruc_email,stud_gender,stud_pswd,stud_registration_date)
                            VALUES ('$studentID','$name','$email','$gender',SHA1('$pswd'),'$dateTime')";
                
                $result = @mysqli_query($dbc,$query);
                
                if($result == true)
                {
                    $fullName = explode(" ", $fullName);
                    $fname = $fullName[0];
                    $lname = $fullName[1]." ".$fullName[2];
                    printf('<div style="background-color:white;margin: 50px;">
                                <p>
                                    <h1 style="text-align:center;font-size: 2em;">Thank you %s.%s, for your registration!!</h1>
                                </p>
                                <p style="text-align:center;font-size: 1em;color:black;">
                                    You are now one of the Badminton Club members!<br>
                                    And quickly register our upcoming events!!
                                </p>
                            </div>',$gender == "M"? "Mr" : "Ms",$fname
                          );
                }
                else
                {
                    echo '<div style="background-color:white;margin: 50px;">'.
                            '<h1 style="text-align:center;font-size: 2em;padding:25px;color:darkred;">'.'System Error'.'</h1>'.
                            '<p style="text-align:left;font-size: 1em;color:black;">'.
                                'You could not be registered due to system error.
                                    We apologize for any inconvenience.
                                    Please register later.'.
                            '</p>'.
                            '<p style="text-align:left;font-size: 1em;color:black;">'.'<b>'.mysqli_error($dbc).'</b>'.'</p>'.
                            '<p style="text-align:left;font-size: 1em;color:black;">'.'Query: '.$query.'</p>'.
                            '</div>';
                        
                }
                
                mysqli_close($dbc);
                include('footer.html');
                exit();
            }
            else // If error detected.
            {
                
                
                printf('<div style="margin:50px;background-color:white;"><h1 style="text-align:center;font-size: 2em;">OOPS... There are input errors</h1>
                        <ul style="color: red;text-align:left;font-size: 1em;list-style-position:inside;"><li style="padding:10px;">%s</li></ul>
                        <p style="text-align:center;">[ <a href="javascript:history.back()">Back</a> ]</p></div>',
                        implode('</li><li style="padding:10px;">', $error));
                
            }
        }
        else // GET or hacks.
        {
            // JavaScript to redirect user to the right page.
            echo '<script type="text/javascript">
            location = "register.php";</script>';
        }
    ?>
    <footer>
         <?php
            include('footer.html');
        ?>
    </footer>
    </body>
</html>
