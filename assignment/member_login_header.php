<?php
if(isset($_POST['home']))
{
    session_destroy();
}
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8" />
    <meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="member_login_header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    <title>Badminton Club</title>
    </head>
    
    <header>
        <nav>
            <ul>
                <li><a href="member_profile.php">Profile</a></li>
                <li><a href="member_event.php">Events</a></li>
                <li><a href="home.php" name="home">Log Out</a></li>
            </ul>
        </nav>
    </header>
</html>
