<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="keywords" content="Badminton,Ticket,Events, Bookings"/>
        <title>Badminton club</title>
        <link href="home.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link href="bd_styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>        
    </head>

    <header>
        <?php
            include('header.html');
        ?>
    </header>

    <body style="background-color: blueviolet">
        <style>video {display: block; width: 95%; height: 70%;} </style>
            <br/>
            <h1 class="title">BADMINTON FAMILY</h1>

            <div class="p1">
                <p>Badminton is a small indoor sport that is made of feathers and cork by using a long-handled net-like racket across the net. 
                   The badminton game is played on a rectangular field with a net in the middle of the field.
                   The two sides use various techniques and tactics such as serve, hit and move to hit the ball back and forth on the net to 
                   prevent the ball from falling within the effective area of ​​the side, or Make the opponent hit the ball as a win.</p>
            </div>

            <div class="video1">
                <video controls>
                    <source src="bd_video.mp4" type="video/mp4">
                    <source src="bd_video.ogg" type="video/ogg">
                </video>
            </div>

            <div class="video_name1">
                <p>Learn Badminton In One Minute</p>
            </div>

            <div class="p2">
                <p>The purpose of the badminton game is to enrich the amateur cultural life, 
                   cultivate the good qualities of tenacious struggle and courage, and at the same 
                   time can enhance everyone's feelings and promote mutual exchanges.
                </p>
            </div>

            <br/><br/>
            <h2 class="title">Club requirements</h2>
            <div class="p3">
                <nav>
                    <ul>
                        <li>- assist in friendship first and competition second.</li>
                        <li>- Civilized competition, respect human beings.</li>
                        <li>- Anyone who falsifies and imposters will be disqualified from the competition.</li>
                        <li>- Focus on entertainment, keep the rules simple and focus only on the key points.</li>
                    </ul>
                </nav>
            </div>


            <div class="video2">
                <video controls>
                    <source src="bd_video2.mp4" type="video/mp4">
                    <source src="bd_video2.ogg" type="video/ogg" id="v2">
                </video>
            </div>

            <div class="video_name2">
                <p>Badminton Club TARUC</p>
            </div>
    </body>
    <br>
    <footer>
        <?php
            include('footer.html');
        ?>
    </footer>
</hmtl>

