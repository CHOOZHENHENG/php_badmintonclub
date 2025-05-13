<html>
    <head>
        <title>Event Booking List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
    </header>
    
    <body style="background-image: url('blue.jpg');background-size: 100%;">
        <form action="admin-event-booking-list.php" method="post">
            <div>
                <br><br><br><br>
                <h1 style="color: blue">List of Events</h1>
                <hr>
                <br>
                <table border="1" cellpadding="7" cellspacing="0">
                    <tr>
                        <th>Select</th>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Member Price (Currency:RM)</th>
                        <th>Non-Member Price (Currency:RM)</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        require_once('mySqli_connect.php'); // Connect to the db.

                        if (!empty($_POST))
                        {
                            $event_name = $_POST['checked'];

                            $q = "DELETE FROM event_list WHERE event_name IN('".implode("','", $event_name)."')";
                            $r = mysqli_query($dbc, $q); 

                            if ($r)
                            {
                                echo '<h1>Thank you!</h1><p>The event has been deleted successfully.<br /></p>';
                            } else
                            {
                                echo '<h1>System Error!</h1><pclass="error">The event cannot be deleted due to a system error.</p>';
                            }
                        }

                        $q = "SELECT * FROM event_list";
                        $r = mysqli_query($dbc, $q); // Run the query.
                        $num = mysqli_num_rows($r);
                        if ($num > 0)
                        {
                            while ($row =mysqli_fetch_array($r))
                            {
                                printf('
                                    <tr>
                                        <td><input type="checkbox" name="checked[]" value="'.$row['event_name'].'" /></td>
                                            <td>'.$row['event_name'].'</td>
                                            <td>'.$row['date'].'</td>
                                            <td>'.$row['time'].'</td>
                                            <td align="center">'.$row['member_price'].'</td>
                                            <td align="center">'.$row['non_member_price'].'</td>
                                            <td>'.$row['contact'].' </td>
                                            <td align="center">
                                                [<a href="event-edit.php?name='.$row['event_name'].'">Edit</a>] | [<a href="event-delete.php?name='.$row['event_name'].'">Delete</a>]
                                            </td>
                                        </tr>
                                    ');
                            }
                        }

                        printf('
                                <tr>
                                    <td colspan="8">
                                    '.$num.' record(s) returned.
                                    [<a href="event-insert.php">Insert New Event</a>]
                                    </td>
                                </tr>
                                ');

                        mysqli_free_result($r); // Free up the resources.

                        mysqli_close($dbc); // Close the database connection.
                    ?>
                </table>
                <br/>
                <input type="submit" name="delete" value="Delete" onclick="return confirm('This will delete all checked records. \nAre you sure?')" />
            </div>
        </form>
    </body>
    <footer>
        <?php
            include('footer.html');
        ?>
    </footer>
</html>
