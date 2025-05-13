<?php 
require_once('mySqli_connect.php');

$stud_id = $_REQUEST['id'];
$Name = "";
$Gender = "";
$Mobile_phone = "";
$Email_address = "";
$Event = "";
$Event_registration_date = "";
$error = "";

if (!empty($_POST)){
    
    $stud_id = strtoupper(trim($_POST['id']));
    
    $q = "DELETE FROM non_member_eb WHERE stud_id = '$stud_id'";
    $r = mysqli_query($dbc, $q);
    
    if ($r){
        echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Thank you!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The record has been deleted successfully.</p>'.
                      '</div>'.
        '<p>[<a href="admin-non-member-list.php">Back to Non-Member List</a>]</p>';
} else{
    echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">System Error!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The record cannot be deleted due to a system error.</p>'.
                      '</div>';
}
$stud_id = "";
$Name = "";
$Gender = "";
$Mobile_phone = "";
$Email_address = "";
$Event = "";
$Event_registration_date = "";
} else {
    $q = "SELECT * FROM non_member_eb WHERE stud_id = '$stud_id'";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r)== 1) {
    $row = mysqli_fetch_array($r);
    $stud_id = $row['stud_id'];
    $Name = $row['Name'];
    $Gender = $row['Gender'];
    $Mobile_phone = $row['Mobile_phone'];
    $Email_address = $row['Email_address'];
    $Event = $row['Event'];
    $Event_registration_date = $row['Event_registration_date'];
}
}
mysqli_close($dbc);
?>

<html>
    <head>
         <title>Delete Non-Member Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" gref="css/style.css"/>
    </head>
    <body>
        <div>
            <form action="non-member-delete.php" method ="post">
            <?php
            if (empty($_POST))
            {
            ?>
                <br>
             <h1 style="color: blue">Delete Non-Member</h1>
             <p>Are you sure you want to delete the following non-member?</p>
             <hr>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>ID</td>
                    <td>
                        <?php echo $stud_id; ?>
                        <input type="hidden" name="id" value="<?php echo $stud_id; ?>" maxlength="10" /></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $Name; ?></td>
                </tr>
                <tr>
                    <td>Gender </td>
                    <td><?php echo $Gender; ?></td>
                </tr>
                <tr>
                    <td>Phone No.</td>
                    <td><?php echo $Mobile_phone; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $Email_address; ?></td>
                </tr>
                <tr>
                    <td>
                        Event
                    </td>
                    <td><?php echo $Event; ?></td>
                </tr>
                <tr>
                    <td>Event Registration Date</td>
                    <td><?php echo $Event_registration_date; ?></td>
                </tr>
        </table>
             <br>
             <input type="submit" name="delete" value="Delete" />
            <input type="button" name="Cancel" value="Back to Non-Member List" onclick="location='admin-non-member-list.php'" />
            <?php
            }
            ?>
             </form>
    </div>
    </body>
</html>
