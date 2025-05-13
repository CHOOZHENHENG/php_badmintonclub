<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Upcoming events</title>
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link href="upcoming_events.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>

    <header>
       <?php
            include('header.html');
        ?>
    </header>
    
    <body>
        <p><b>Upcoming Events</b></p>
        <div class="main">
            <img src="Men's single.jpg" class="menSingle">
            <img src="Men's double.jpg" class="menDoubles">
            <img src="Women's doubles.jpg" class="womenDoubles">
            <img src="Mixed doubles.jpg" class="mixedDoubles">
        </div>
        
        <div class="last">
            <p>
                For those who win the tournament in <b>TOP 3</b>, you will be awarded CASH, MEDAL, HAMPER, CERTIFICATE.
            </p>
            
            <p>
                All participates are given TCBC 1.0 Sport T-shirt and a Participation Certificate.
                <b>NOTE: Please register the event(s) by 31 OCT 2021.</b>
                <button type="submit" class="button" ><a href="event_booking.php">Register events now!</a></button>
            </p>
        </div>
        
        <footer>
            <?php
                include('footer.html');
            ?>
        </footer>
    </body>
    
    
</html>

