<!DOCTYPE html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="keywords" content="Badminton,Ticket,Events, Bookings"/>
        <title>Admin Profile</title>
        <link href="member_profile.css" rel="stylesheet" type="text/css"/>
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
        <link href="bd_styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>        
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body style="background-image: url('blue.jpg');background-size: 100%;">
        <img src="lee_chong_wei.jpg" alt="Avatar" class="avatar">
        
      
        
        <div class="Title">
            <br><h1>Admin Information</h1><br>
        </div>
        
         <?php 

require_once('mySqli_connect.php'); // Connect to the db.

if (!empty($_POST)){
    
$id = $_POST['checked'];

$q = "DELETE FROM admin_profile WHERE id IN('".implode("','", $id)."')";
$r = @mysqli_query($dbc, $q); 

if ($r){
    echo '<h1>Thank you!</h1><p>The admin has been deleted successfully.<br /></p>';
} else{
    echo '<h1>System Error!</h1><pclass="error">The admin cannot be deleted due to a system error.</p>';
}
}

$q = "SELECT * FROM admin_profile";
$r = @mysqli_query($dbc, $q); // Run the query.
$num = mysqli_num_rows($r);
if ($num > 0){
    while ($row =mysqli_fetch_array($r)){
        printf('
        <p align="right" style="color: red;">
            [<a href="admin-profile-edit.php?profile='.$row['id'].'">Edit</a>]
        </p>
            <br>
              <strong style="font-size:larger"><strong style="color: black">Admin ID: %s</strong></strong></p><br/>
               <strong style="font-size:larger"><strong style="color: black">Name: %s</strong></strong></p><br/>
                <strong style="font-size:larger"><strong style="color: black">Email Address: %s</strong></strong></p><br/>
                <strong style="font-size:larger"><strong style="color: black">Gender: %s</strong></strong></p><br/>
               <strong style="font-size:larger"><strong style="color: black">Password: %s</strong></strong></p><br/>
               ',
                    $row['id'], $row['name'], $row['email'], $row['gender'],$row['password']);
                
}
}



mysqli_free_result($r); // Free up the resources.
 
mysqli_close($dbc); // Close the database connection.
?>
    </body>
    
        <br>
        <footer>
            <?php
            include('footer.html');
        ?>
        </footer>


