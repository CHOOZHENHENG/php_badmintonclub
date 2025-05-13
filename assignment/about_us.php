<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    <meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About Us</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <link href="bd_aboutus_layout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    
    <header> 
        <?php
            include('header.html');
        ?>
    </header>
    
    <body>
        <div id="aboutus">
            <div id="row1">
                <h1>ABOUT US</h1>
                <p>
                    Founded in 2021, Badminton Club gets students in touch with the sport of badminton.
                    This is a club where students compete with each other which instil a sense of sportsmanship.
                    This club welcomes all students to join this fun and energetic game throughout their academic life.
                </p>
            </div>
            <div id="row2">
                <div id="col">
                    <h2>Who Are We</h2>
                    <p>
                        Our Founding Team has a total of three members for now.
                    </p>
                    <ul>
                        <li>Choo Zhen Heng (President)</li>
                        <li>Ong Hong Zhen (Treasurer)</li>
                        <li>Chong Kai Xuan (Secretary)</li>
                    </ul>
                </div>
                <div id="col">
                    <img src="badminton.jpg" alt="badminton">
                </div>
            </div>
        </div>
        <footer>
        <?php
            include('footer.html');
        ?>
        </footer>
    </body>
</html>
