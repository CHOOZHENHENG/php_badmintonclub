<html>
    <head>
         <title>Non-Member Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" gref="css/style.css"/>
    </head>
    
     <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body style="background-image: url('blue.jpg');background-size: 100%;">
        <form action="admin-non-member-list.php" method="post">
        <div>
            <br>
            <br>
            <br>
            <br>
             <h1 style="color: blue">List of Non-Member</h1>
             <hr>
             <br>
        <table border="1" cellpadding="7" cellspacing="0">
            <tr>
                 <th>Select</th>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Phone No.</th>
                 <th>Email</th>
                <th>Event</th>
                <th>Registration Date</th>
                <th>Action </th>
            </tr>
        
        <?php 

require_once('mySqli_connect.php'); // Connect to the db.

if (!empty($_POST)){
    
$stud_id = $_POST['checked'];

$q = "DELETE FROM non_member_eb WHERE stud_id IN('".implode("','", $stud_id)."')";
$r = @mysqli_query($dbc, $q); 

if ($r){
    echo '<h1>Thank you!</h1><p>The non-member has been deleted successfully.<br /></p>';
} else{
    echo '<h1>System Error!</h1><pclass="error">The non-member cannot be deleted due to a system error.</p>';
}
}

$q = "SELECT * FROM non_member_eb";
$r = @mysqli_query($dbc, $q); // Run the query.
$num = mysqli_num_rows($r);
if ($num > 0){
    while ($row =mysqli_fetch_array($r)){
        printf('
            <tr>
                <td><input type="checkbox" name="checked[]" value="'.$row['stud_id'].'" /></td>
                <td>'.$row['stud_id'].'</td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Gender'].'</td>
                <td>'.$row['Mobile_phone'].'</td>
                <td>'.$row['Email_address'].'</td>
                <td>'.$row['Event'].' </td>
                 <td>'.$row['Event_registration_date'].' </td>
                <td align="center">
                [<a href="non-member-edit.php?id='.$row['stud_id'].'">Edit</a>] | [<a href="non-member-delete.php?id='.$row['stud_id'].'">Delete</a>]
                    </td>
            </tr>
    ');
}
}

printf('
            <tr>
                <td colspan="9">
                '.$num.' record(s) returned.
                 [<a href="event_booking.php">Insert Record</a>]
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
    <br>
    <footer>
        <?php
            include('footer.html');
        ?>
    </footer>
</html>
