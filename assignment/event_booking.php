<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Event Booking</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="event_booking.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    
    <header>
        <?php
            include('header.html');
        ?>
    </header>
    
    <body>
        <form action="ticket-records.php" method="POST">
            <fieldset>
                <h1 style="color: blue">Event Booking For Upcoming Events</h1>
                <hr>
                <p>
                    Student ID: 
                <input type="text" name="studentID" id="studentID"/>
                </p>
                <p>
                    Name:
                    <input style="margin-left:51px;" type="text" name="name" value="" maxlength="40" id="name"/>
                </p>
                <p>
                    Gender: 
                    <input style="margin-left:48px;" type="radio" name="gender" value="M" id="gender"/> Male
                    <input type="radio" name="gender" value="F" id="gender"/> Female
                </p>
                <p>
                    Mobile Phone: 
                    <input type="text" name="phone"  id="phone" maxlength="12"/>
                </p>
                 <p>
                    Email Address: 
                    <input type="text" name="email"  id="email" maxlength="50"/>
                </p>
                <p>
                    Membership:
                    <input type="radio" name="membership" value="member"/>Member
                    <input type="radio" name="membership" value="non-member"/>Non-member
                </p>
                <p>
                    Upcoming events: <p style="color:red">*You are only able to select one event for yourself*</P>
                    <select name="events" id="events" >
                        <option  value="">Select an event</option>
                        <option  value="Men's Single (20 NOV)">Men's Single (20 NOV)</option>
                        <option  value="Men's Doubles (21 NOV)">Men's Double (21 NOV)</option>
                        <option  value="Women Doubles (28 NOV)">Women's Double (28 NOV)</option>
                        <option  value="Mixes Doubles (29 NOV)">Mixed Double (29 NOV)</option>
                    </select>
                </p>
                <div>
                    <input type="submit" value="Submit" name="submit" />
                    <input type="reset" value="Reset" name="reset" />
                </div>
            </fieldset>
        </form>

        <footer>
        <?php
            include('footer.html');
        ?>
        </footer>
    </body>
</html>
