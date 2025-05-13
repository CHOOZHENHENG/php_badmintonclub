<?php
function detectInputError()
{
    global $student_id, $name, $gender, $phone, $email, $membership, $events;

    $error = array();

    if($student_id == null)
    {
        $error['studentID'] = 'No student id? Please enter your <strong>STUDENT ID</strong>.';
    }
    else if(!preg_match('/^\d{2}[A-Z]{3}\d{5}$/',$student_id))
    {
        $error['studentID'] = '<strong>Student ID<strong> is of invalid format. Format: 99XXX99999.';
    }
    
    if ($name == null)
    {
        $error['name'] = 'Nameless? Please enter your <strong>name</strong>.';
    }
    else if (strlen($name) > 30)
    {
        $error['name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
    }
    else if (!preg_match('/^[A-Za-z @,\'\.\-V]+$/', $name))
    {
        $error['name'] = 'There are invalid characters in your <strong>name</strong>.';
    }

    
    if ($gender == null)
    {
        $error['gender'] = 'Unisex? Please select your <strong>gender</strong>.';
    }
    else if (!preg_match('/^[MF]$/', $gender))
    {
        $error['gender'] = '<strong>Gender</strong> can only be either M or F.';
    }

    
    if ($phone == null)
    {
        $error['phone'] = 'Please enter your <strong>mobile phone</strong> number.';
    }
    else if (!preg_match('/^[0-9]{3}-[0-9]{7,8}$/', $phone))/* condition changed*/
    {
        $error['phone'] = 'Your <strong>mobile phone</strong> number is invalid. Format: 999-9999999
    and starts with 01.';
    }

    
    if ($email == null)
    {
        $error['email'] = 'Please enter your <strong>email</strong> number.';
    }
    else if (!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/", $email))
    {
        $error['email'] = 'Your <strong>email address</strong> is invalid.';
    }
    
    
    if($membership == null)
    {
        $error['member'] = 'Please select one of the <strong>membership type</strong>';
    }
    
    
    if ($events == null)
    {
        $error['events'] = 'Please select an <strong>event</strong> that you want to join.';
    }


    return $error;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ticket Records</title>
    <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link href="bd_aboutus_layout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>

<header>
        <?php
            include('header.html');
        ?>
</header>

<body style="font-size: 1.2em">
<?php
   
    if (isset($_POST['submit'])) 
    {
        $student_id = trim($_POST['studentID']);
        $name = trim($_POST['name']);    
        $gender = trim($_POST['gender']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $membership = trim($_POST['membership']);
        $events = $_POST['events'];
        if($events != 'Mixes Doubles (29 NOV)' && $events != 'Women Doubles (28 NOV)')
        {
            $events = addslashes($events);
        }

        $error=detectInputError();
        if(empty($error))
        {
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $date_time = date('d/m/Y H:iA');
            require_once 'mySqli_connect.php';
            
            if($membership == 'member')
            {
                $select_q = "SELECT stud_id FROM member";
                $select_r = mysqli_query($dbc,$select_q);
                
                if(mysqli_num_rows($select_r) > 0)
                {       
                    while($row = mysqli_fetch_array($select_r,MYSQLI_ASSOC))
                    {
                        $id[] = $row['stud_id'];                        
                    }
                    
                    //Uncomment the below COMMENT if u don't understand how my program flow
                        /*echo '<pre>';
                        print_r($id);
                        echo '</pre>';
                        echo count($id).'<br>';*/
                    //You will see clearly how the data been stored in an array from mysqli_fetch_array
                    
                    for($num = 0;$num < count($id);$num++)
                    {
                        //The below comments will show the data for each loop, just want to see how the value changed for each loop
                        //echo $num.'->'.$id[$num].' --> '.$student_id.'<br>';
                        if(strcmp(trim($id[$num]),trim($student_id) == 0))
                        {
                            $insert_q = "INSERT INTO member_eb(stud_id, Name, Gender, Mobile_phone, Email_address, Event, Event_registration_date)
                                            VALUES ('$student_id', '$name', '$gender', '$phone', '$email', '$events', '$date_time')";
                        
                        }
                        else
                        {
                            if($num == (count($id) - 1))
                            {
                                //echo $num; (ignore this, i just want to know the value inside the $num)
                                echo '<div style="background-color:grey;margin: 50px;">'.
                                        '<p style="text-align:center;font-size: 1.8em;padding:25px;color:darkred;">'.
                                            'Sorry, you are not one of the member in this badminton club!!<br>Please select non-member.'.
                                        '</p>'.
                                     '</div>';
                                mysqli_close($dbc);
                                include('footer.html');
                                exit();
                            }
                        }
                    }     
                }
                
            }
            else
            {
                $select_q = "SELECT stud_id FROM member";
                $select_r = mysqli_query($dbc,$select_q);
                
                if(mysqli_num_rows($select_r) > 0)
                {      
                    
                    while($row = mysqli_fetch_array($select_r))
                    {
                        if(strcmp($row['stud_id'], $student_id) == 0)
                        {
                            echo '<div style="background-color:grey;margin: 50px;">'.
                                    '<p style="text-align:center;font-size: 1.8em;padding:25px;color:darkred;">'.
                                        'You should check the member of membership data field!!<br>You are are one of the member in this badminton club.'.
                                    '</p>'.
                                 '</div>';
                            mysqli_close($dbc);
                            include('footer.html');
                            exit();
                            
                        }
                        else
                        {
                            $insert_q = "INSERT INTO non_member_eb(stud_id, Name, Gender, Mobile_phone, Email_address, Event, Event_registration_date)
                                        VALUES ('$student_id', '$name', '$gender', '$phone', '$email', '$events', '$date_time')";
                        
                           
                        }
                    }
                }
            }
            
             $insert_r = mysqli_query($dbc,$insert_q);
            
            if($insert_r == 'true') 
            {   
                
                printf(' 
                       <h1>Thanks for joining</h1>
                        <p>
                            <strong style="font-size:larger">%s.%s</strong><br/>
                        <strong style="color: blue">(Confirmation)</strong><br/>
                        <hr>
                        You have joined this event:
                        </p>',
                        $gender == 'M'?'Mr':'Ms',$name);

                    echo stripslashes($events);

                    printf('
                    <p>[<a href="event_booking.php">Booking one more for your friend?</a>]</p>');
            }
            else
            {
                echo '<div style="background-color:grey;margin: 50px;">'.
                        '<h1 style="text-align:center;font-size: 2em;padding:25px;color:darkred;">'.'System Error'.'</h1>'.
                        '<p style="text-align:left;font-size: 1em;color:black;">'.
                            'You could not be registered due to system error.
                                We apologize for any inconvenience.
                                Please register later.'.
                        '</p>'.
                        '<p style="text-align:left;font-size: 1em;color:black;">'.'<b>'.mysqli_error($dbc).'</b>'.'</p>'.
                        '<p style="text-align:left;font-size: 1em;color:black;">'.'Query: '.$insert_q.'</p>'.
                        '</div>';

            }
                
                mysqli_close($dbc);
                include('footer.html');
                exit();
        }
        else
        {
            printf('
                    <h1>OOPS... There are input errors</h1>
                    <ul style="color:red"><li>%s</li></ul>
                    <p>[<a href="javascript:history.back()">Back</a>]</p>',
                    implode('</li><li>',$error));
        }
    }
    else
    {
        echo'
            <script type=text/javascript">
            location = "event-booking.php";
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
