
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="keywords" content="Badminton,Ticket,Events, Bookings"/>
<title>Member Login</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="bd_login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<header>
    <?php
        include('header.html');
    ?>
</header>
<body>

<h2>Member Login Form</h2>

<form action="member_login_form.php" method="post">
  <div class="imglogin">
      <img src="bd_login_image.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="studentID"><b>Student ID</b></label>
    <input type="text" placeholder="Enter Your Student ID" name="studentID" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Your Password" name="pword" required
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,15}"
        title="Must contain at least one number, one uppercase, one lowercase letter, one special characters and between 8 and 15 characters">
        
    <button type="submit" name="submit">Login</button>
    <button type="reset">Reset</button>
    
    <a class="pword" href="admin_login.php">Login As Admin</a>
  </div>

  <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="rbutton"><a href="register.php">Register</a></button>
    <span class="pword">Forgot <a href="#">password?</a></span>
  </div>
</form>

<footer>
    <?php
        include('footer.html');
    ?>
</footer>
</body>
</html>
