<?php
$page_title = 'memberlogin';
include('header.php');
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Member Event</title>
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link href="upcoming_events.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
    <style>
        img.image{
            width: 46%;
            margin: 2% auto;
            padding: 2%;
            display: block;
            border: 5px solid indianred;
            background-color: azure;
            border-radius: 50px;
        }
    </style>

    <header>
        <?php
            include('member_login_header.php');
        ?>
    </header>
    
    <body>
        <p><b>You have registered the event below!</b></p>
        
        <?php
        require_once('mySqli_connect.php');

        $studentID = $_SESSION['studentID'];
        
        $select_q = "SELECT Event FROM member_eb WHERE stud_id = '$studentID'";
        $select_r = mysqli_query($dbc,$select_q);
        
            if(mysqli_num_rows($select_r) == 1)
            {
                $row = mysqli_fetch_array($select_r);
                $event = $row['Event'];
                
                $events = addslashes(substr($event, 0, 12));
                
                $select_q = "SELECT image FROM event_list WHERE event_name = '$events'";
                $select_r = mysqli_query($dbc,$select_q);

                    if(mysqli_num_rows($select_r) == 1)
                    {
                        $row = mysqli_fetch_array($select_r);
                        echo '<img class="image" src="data:image/jpg;base64,'. base64_encode($row['image']).'">';
                        /*?>
                            <img src="<?php echo $row['image'];?>width="100" height="100">"
                        <?php*/
                    }
                    else
                    {
                        echo '<br>System error<br>';
                        echo mysqli_error($dbc).'Query: '. $select_q;
                    }
            }else
            {
                echo '<br>System error<br>';
                echo mysqli_error($dbc).'Query: '. $select_q;
            }
            
        ?>
        <?php
        /*require_once('mysqli_connect.php');

        $studentID = $_SESSION['studentID'];

        $select_q = "SELECT * FROM member_eb WHERE stud_id = '$studentID'";
        $select_r = mysqli_query($dbc,$select_q);
            if(mysqli_num_rows($select_r) == 1)
            {
                while($row = mysqli_fetch_array($select_r))
                {
                    $studentID = $row['stud_id'];
                    $studentName = $row['Name'];
                    $studentGender = $row['Gender'];
                    $phone= $row['Mobile_phone'];
                    $tarucEmail = $row['Email_address'];
                    $event = $row['Event'];

                    $select_q = "SELECT image FROM event_list WHERE event_name = '$event'";
                    $select_r = mysqli_query($dbc,$select_q);

                    if(mysqli_num_rows($select_r) == 1)
                    {
                        while($row = mysqli_fetch_array($select_r))
                        {
                            echo '<img src="data:image/jpg;base64,'. base64_decode($row['image']).'">';
                        }
                    }
                }
            }

            mysqli_close($dbc);*/
        ?>
        <!--<div class="main">
            <img src="Men's single.jpg" class="menSingle">
            <img src="Men's double.jpg" class="menDoubles">
            <img src="Women's doubles.jpg" class="womenDoubles">
            <img src="Mixed doubles.jpg" class="mixedDoubles">
        </div>-->
        
        <div class="last">
            <p>
                For those who win the tournament in <b>TOP 3</b>, you will be awarded CASH, MEDAL, HAMPER, CERTIFICATE.
            </p>
            
            <p>
                All participates are given TCBC 1.0 Sport T-shirt and a Participation Certificate.
                <b>NOTE: Please register the event(s) by 31 OCT 2021.</b>
            </p>
        </div>
        
        <footer>
            <?php
                include('footer.html');
            ?>
        </footer>
    </body>
    
    
</html>

