<?php 
require_once('mySqli_connect.php');

$id = $_REQUEST['profile'];
$name = "";
$email = "";
$gender = "";
$pasword = "";
$error = "";



// Check if the form has been submitted:
if (!empty($_POST)){
    
    $id = trim($_POST['profile']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $password = trim($_POST['password']);
    
      $error = array();
      if($name == null){
          $error['name'] = 'Please enter the <strong>Name</strong>.';
      }
      if($email == null){
          $error['email'] = 'Please enter the <strong>Email</strong>.';
      }
       if($gender == null){
          $error['gender'] = 'Please select the <strong>Gender</strong>.';
      }
       if($password == null){
          $error['password'] = 'Please enter the <strong>Password</strong>.';
      }
      
      
      if (empty($error)){
          
          $q = "UPDATE admin_profile SET name = '$name', email = '$email', gender = '$gender', password = '$password' WHERE id = '$id'";
          $r = @mysqli_query($dbc, $q);
          
          if($r){
              echo '<h1>Thank You!</h1><p>The profile has been updated successfully.<br /></p>';
          }else{
              echo '<h1>Stystem Error!</h1><p class="error">The profile cannot be updated due to a system error.</p>';
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

$q = "SELECT * FROM admin_profile WHERE id = '$id'";
$r = @mysqli_query($dbc, $q); 

if (mysqli_num_rows($r)== 1) {
    $row = mysqli_fetch_array($r);
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $gender = $row['gender'];
    $password = $row['password'];
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
    <link rel="stylesheet" type="text/css" gref="css/style.css"/>
    <title>Edit Admin Profile</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body>
        <form action="admin-profile-edit.php" method="POST">
            <br>
                <h1 style="color: blue">Edit Admin Profile</h1>
                <hr>
                <table border="1" cellpadding="7" cellspacing="0">
                    <tr>
                        <td>Admin ID:</td>
                        <td>
                            <?php echo $id; ?>
                            <input type="hidden" name="profile" value="<?php echo $id; ?>" maxlength="10" />
                        </td>
                    </tr>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Email Address: </td>
                    <td>
                        <input type="text" name="email"  value="<?php echo $email; ?>" maxlength="50"/>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                       <input type="radio" name="gender" value="M" <?php if ($gender == 'M') {echo 'checked="checked"'; } ?>/> Male
                    <input type="radio" name="gender" value="F" <?php if ($gender == 'F') {echo 'checked="checked"'; } ?>/> Female
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="text" name="password"  maxlength="15" value="<?php echo $password; ?>"/>
                    </td>
                </tr>
                </table>
        </div>
        <input type="submit" name="Update" value="Update" />
            <input type="button" name="Cancel" value="Back to Admin Profile" onclick="location='admin-profile.php'" />
        </form>

        <footer>
        <?php
            include('footer.html');
        ?>
        </footer>
    </body>
</html>