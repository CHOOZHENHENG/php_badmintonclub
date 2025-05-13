<?php 
    require_once('mySqli_connect.php');

    $event_name =$_REQUEST['name'];
    $date = "";
    $time = "";
    $member_price = "";
    $non_member_price = "";
    $contact = "";
    $error = "";

    if (!empty($_POST))
    {

        $event_name = trim($_POST['name']);

        $q = "DELETE FROM event_list WHERE event_name = '$event_name'";
        $r = mysqli_query($dbc, $q);

        if ($r)
        {
            echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Thank You!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The record has been deleted successfully.</p>'.
                      '</div>'.
            '<p>[<a href="admin-event-booking-list.php">Back to Event List</a>]</p>';
        } 
        else
        {
            echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Stystem Error!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The record cannot be deleted due to a system error.</p>'.
                      '</div>';
        }
            $event_name = "";
            $date = "";
            $time = "";
            $member_price = "";
            $non_member_price = "";
            $contact = "";
    } 
    else 
    {
        $event_names = addslashes($event_name);
        $q = "SELECT * FROM event_list WHERE event_name= '$event_names'";
        $r = mysqli_query($dbc, $q);

        if (mysqli_num_rows($r)== 1) 
        {
            $row = mysqli_fetch_array($r);
            $event_name = $row['event_name'];
            $date = $row['date'];
            $time = $row['time'];
            $member_price = $row['member_price'];
            $non_member_price = $row['non_member_price'];
            $contact = $row['contact'];
        }
    }
    mysqli_close($dbc);
?>

<html>
    <head>
         <title>Delete Event Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" gref="css/style.css"/>
    </head>
    <body>
        <div>
            <form action="event-delete.php" method ="post">
            <?php
            if (empty($_POST))
            {
            ?>
                <br>
                <h1 style="color: blue">Delete Event</h1>
             <p>Are you sure you want to delete the following event?</p>
             <hr>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <?php echo $event_name; ?>
                        <td>Event Name:</td>
                        <td>
                            <input type="hidden" name="name" value="<?php echo $event_name; ?>" maxlength="50" /></td>
                        </td>
                    </tr>
                <tr>
                    <td>Date (yyyy-mm-dd):</td>
                    <td><?php echo $date; ?></td>
                </tr>
                <tr>
                    <td>Time (hh:mm):</td>
                    <td><?php echo $time; ?></td>
                </tr>
                <tr>
                    <td>Member Price (Currency:RM):</td>
                    <td><?php echo $member_price; ?></td>
                </tr>
                <tr>
                    <td>Non-Member Price (Currency:RM):</td>
                    <td><?php echo $non_member_price; ?></td>
                </tr>
                <tr>
                    <td>Contact: </td>
                    <td><?php echo $contact; ?></td>
                </tr>
        </table>
             <br>
             <input type="submit" name="Delete" value="Delete" />
            <input type="button" name="Cancel" value="Back to Event List" onclick="location='admin-event-booking-list.php'" />
            <?php
            }
            ?>
             </form>
    </div>
    </body>
</html>
