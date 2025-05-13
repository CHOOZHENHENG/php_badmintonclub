<?php 

$member_id = "";
$member_name = "";
$gender = "";
$phone = "";
$email = "";
$member = "";
$event = "";
$error = "";



// Check if the form has been submitted:
if (!empty($_POST)){
    
    $member_id = strtoupper(trim($_POST['member_id']));
    $member_name = trim($_POST['member_name']);
    
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $member = trim($_POST['member']);
        $event = $_POST['event'];
    
      $error = array();
      if($member_id == null){
          $error['member_id'] = 'Please enter the <strong>Member ID</strong>.';
      }
      if($member_name == null){
          $error['member_name'] = 'Please enter the <strong>Member Name</strong>.';
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
       if($member == null){
          $error['member'] = 'Please select the <strong>Member Condition</strong>.';
      }
      if($event == null){
          $error['event'] = 'Please select the <strong>Event</strong>.';
      }
      
      if (empty($error)){
          
          require_once('includes/mysqli_connect.php');
          
          $q = "INSERT into Member (MemberID, MemberName, Gender, Phone, Email, Member, Event)VALUES ('$member_id', '$member_name', '$gender', '$phone', '$email', '$member', '$event')";
          $r = @mysqli_query($dbc, $q);
          
          if($r){
              echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Thank You!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The member has been registered successfully.</p>'.
                      '</div>';
          }else{
              echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Stystem Error!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The member cannot be registered due to a system error.</p>'.
                      '</div>';
            
          }
          mysqli_close($dbc);
          }
          else{
              echo "<ul class='error'>";
              foreach ($error as $value){
                  echo "<li>$value</li>";
              }
              echo "</ul>";
          }
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <meta name="keyword" content="badminton, club" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Insert Member Record</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="event_booking.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body>
        <form action="member-insert.php" method="POST">
            <fieldset>
                <h1 style="color: blue">Insert Member Record</h1>
                <hr>
                 <p style="color: brown">
                    Member ID:
                    <input type="text" name="member_id" value="<?php echo $member_id; ?>" maxlength="10" /></td>
                </p>
                <p style="color: brown">
                    Member Name:
                    <input style="margin-left:51px;" type="text" name="member_name" value="<?php echo $member_name; ?>"/>
                </p>
                <p style="color: brown">
                    Gender: 
                    <input style="margin-left:48px;" type="radio" name="gender" value="M" <?php if ($gender == 'M') {echo 'checked="checked"'; } ?>/> Male
                    <input type="radio" name="gender" value="F" <?php if ($gender == 'F') {echo 'checked="checked"'; } ?>/> Female
                </p>
                <p style="color: brown">
                    Mobile Phone: 
                    <input type="text" name="phone"  value="<?php echo $phone; ?>" maxlength="11"/>
                </p>
                 <p style="color: brown">
                    Email Address: 
                    <input type="text" name="email"  value="<?php echo $email; ?>" maxlength="50"/>
                </p>
              <p style="color: brown">
                    Member Condition: 
                    <input style="margin-left:48px;" type="radio" name="member" value="member" <?php echo $member; ?>/> Member
                    <input type="radio" name="member" value="non_member" <?php echo $member;  ?>/> Non-Member
                </p>
                <p style="color: brown">
                    Upcoming events: <p style="color:red">*One event is only able to be select once*</P>
                    <select name="event"  >
                <option value ="">Please select a event.</option>
                <option  value="Men's Single (20 NOV)" <?php if ($event == "Men's Single (20 NOV)") {echo 'selected="true"'; } ?>>Men's Single (20 NOV)</option>
                <option  value="Men's Double (21 NOV)" <?php if ($event == "Men's Double (21 NOV)") {echo 'selected="true"'; } ?>>Men's Double (21 NOV)</option>
                <option  value="Women's Double (28 NOV)" <?php if ($event == "Women's Double (28 NOV)") {echo 'selected="true"'; } ?>>Women's Double (28 NOV)</option>
                <option  value="Mixed Double (29 NOV)" <?php if ($event == "Mixed Double (29 NOV)") {echo 'selected="true"'; } ?>>Mixed Double (29 NOV)</option></select>
                </p>
                <div>
                    <input type="submit" name="insert" value="Insert" />
            <input type="button" name="Cancel" value="Back to Member List" onclick="location='member.php'" />
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