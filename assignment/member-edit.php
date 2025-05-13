<?php 
require_once('mySqli_connect.php');

$student_id = $_REQUEST['id'];
$name = "";
$gender = "";
$phone = "";
$email = "";
$events = "";
$error = "";



// Check if the form has been submitted:
if (!empty($_POST)){
            
    $student_id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $events = trim($_POST['events']);
    $event = addslashes($events);
    
      $error = array();
      if($name == null){
          $error['name'] = 'Please enter the <strong>Name</strong>.';
      }
      if($gender == null){
          $error['gender'] = 'Please select the <strong>Gender</strong>.';
      }
       if($phone == null){
          $error['phone'] = 'Please enter the <strong>Phone Number</strong>.';
      }
       if($email == null){
          $error['email'] = 'Please enter the <strong>Email</strong>.';
      }
      if($events == null){
          $error['events'] = 'Please select the <strong>Event</strong>.';
      }
      
      if (empty($error)){
          
          $q = "UPDATE member_eb SET Name = '$name', Gender = '$gender', Mobile_phone = '$phone', Email_address = '$email', Event = '$event'
                  WHERE stud_id = '$student_id'";
          $r = mysqli_query($dbc, $q);
          
          if($r){
              echo'<div style="background-color:#6CCA9B">'.
                      '<h1 style="text-align:center;font-size: 2em;">Thank You!</h1>'
                      . '<p style="text-align:center;font-size: 1em;color:black;">The record has been updated successfully.<br /></p>'.
                      '</div>';
          }else{
              echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Stystem Error!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The record cannot be updated due to a system error.</p>'.
                      '</div>';
          }
        
          }
          else{
              echo "<ul class='error'>";
              foreach ($error as $value){
                  echo "<li>$value</li>";
              }
              echo "</ul>";
          }
}


$q = "SELECT * FROM member_eb WHERE stud_id = '$student_id'";
$r = mysqli_query($dbc, $q); 

if (mysqli_num_rows($r)== 1) {
    $row = mysqli_fetch_array($r);
    $student_id = $row['stud_id'];
    $name = $row['Name'];
    $gender = $row['Gender'];
    $phone = $row['Mobile_phone'];
    $email = $row['Email_address'];
    $events = $row['Event'];
}
mysqli_close($dbc);
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Member Record</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="event_booking.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body>
        <form action="member-edit.php" method="POST">
            <fieldset>
                <h1 style="color: blue">Edit Member Record</h1>
                <hr>
                 <p style="color: brown">
                    Member ID:
                    <?php echo $student_id; ?>
                    <input type="hidden" name="id" value="<?php echo $student_id; ?>" /></td>
                </p>
                <p style="color: brown">
                    Name:
                    <input style="margin-left:51px;" type="text" name="name" value="<?php echo $name; ?>"/>
                </p>
                <p style="color: brown">
                    Gender: 
                    <input style="margin-left:48px;" type="radio" name="gender" value="M" <?php if ($gender == 'M') {echo 'checked="checked"'; } ?>/> Male
                    <input type="radio" name="gender" value="F" <?php if ($gender == 'F') {echo 'checked="checked"'; } ?>/> Female
                </p>
                <p style="color: brown">
                    Mobile Phone: 
                    <input type="text" name="phone"  value="<?php echo $phone; ?>" />
                </p>
                 <p style="color: brown">
                    Email Address: 
                    <input type="text" name="email"  value="<?php echo $email; ?>" />
                </p>
                <p style="color: brown">
                    Upcoming events: <p style="color:red">*One event is only able to be select once*</P>
                    <select name="events"  >
                <option value ="">Please select a event.</option>
                <option  value="Men's Single (20 NOV)" <?php if ($events == "Men's Single (20 NOV)") {echo 'selected="true"'; } ?>>Men's Single (20 NOV)</option>
                <option  value="Men's Double (21 NOV)" <?php if ($events == "Men's Double (21 NOV)") {echo 'selected="true"'; } ?>>Men's Double (21 NOV)</option>
                <option  value="Women's Double (28 NOV)" <?php if ($events == "Women's Double (28 NOV)") {echo 'selected="true"'; } ?>>Women's Double (28 NOV)</option>
                <option  value="Mixed Double (29 NOV)" <?php if ($events == "Mixed Double (29 NOV)") {echo 'selected="true"'; } ?>>Mixed Double (29 NOV)</option></select>
                </p>
                <div>
                    <input type="submit" name="Update" value="Update" />
            <input type="button" name="Cancel" value="Back to Member List" onclick="location='admin-member-list.php'" />
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