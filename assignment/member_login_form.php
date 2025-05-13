<?php
function &detectInputError($studentID)
{
    $error = array();

    if(!preg_match('/^\d{2}[A-Z]{3}\d{5}$/',$studentID))
    {
        $error['$userID'] = '<br><strong>User ID<strong> is of invalid format. Format: 99XXX99999.';
    }

    return $error;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <title>Member login check</title>
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
                $studentPswd = trim($_POST['pword']);
                
                
                $error = &detectInputError($studentID);

                if (empty($error))
                {
                    $SHA1studentPswd = substr(SHA1($studentPswd),0,15);
                    session_start();
                    $_SESSION['studentID'] = $studentID;
                    $_SESSION['pword'] = $SHA1studentPswd;
                    
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $date_time = date('d/m/Y H:iA');
                    require_once 'mySqli_connect.php';

                    $select_q = "SELECT stud_id, stud_pswd FROM member WHERE stud_id = '$studentID' AND stud_pswd = '$SHA1studentPswd'";
                    $select_r = mysqli_query($dbc,$select_q);

                    $num = mysqli_num_rows($select_r);
                    
                    if($num == 1)
                    {
                        mysqli_close($dbc);
                        header('Location: member_profile.php');
                        
                        
                        /*while ($row = mysqli_fetch_array($select_r,MYSQLI_ASSOC))
                        {
                            $stud_id = $row['stud_id'];
                            $stud_pswd = $row['stud_pswd'];

                            if(strcmp($stud_pswd,$studentPswd) == 0)
                            {
                                $insert_q = "INSERT INTO member_login(stud_id, stud_login_pswd, stud_login_dateTime)
                                            VALUES ('$studentID', SHA1('$studentPswd'), '$date_time')";
                            }
                            
                        } */    
                    }
                    else
                    {
                        echo '<div style="background-color:white;margin: 50px;">'.
                                    '<p style="text-align:center;font-size: 1.8em;padding:25px;color:red;">'.
                                        'Sorry, Password is incorrect!!<br>Please type carefully.'.
                                    '</p>'.
                                 '</div>';
                    }
                    //$insert_r = mysqli_query($dbc,$insert_q);                   
                }
                else
                {
                    if(!empty($error))
                    {
                        printf('<div style="margin:50px;background-color:white;"><h1 style="text-align:center;font-size: 2em;">OOPS... There are input errors</h1>
                        <ul style="color: red;text-align:left;font-size: 1em;list-style-position:inside;"><li style="padding:10px;display: inline-block;">%s</li></ul>
                        <p style="text-align:center;">[ <a href="javascript:history.back()">Back</a> ]</p></div>',
                        implode('</li><li style="padding:10px;">', $error));
                    }
                }
            }
            else
            {
                echo'
                    <script type=text/javascript">
                    location = "member_login.php";
                    </script>
                    ';
            }

        ?>
    <footer>
        <?php
            include('footer.html');
        ?>
    </footer>
    </body>
</html>