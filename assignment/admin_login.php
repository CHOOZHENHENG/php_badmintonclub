<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="keywords" content="Badminton,Ticket,Events, Bookings"/>
<title>Member Login</title>
<link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
<link href="bd_login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<header>
    <?php
        include('header.html');
    ?>
</header>
<body>

<h2>Admin Login Form</h2>

<form action="admin_login_form.php" method="post">
  <div class="imglogin">
      <img src="lee_chong_wei.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Admin ID</b></label>
    <input type="text" placeholder="Enter Your Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Your Password" name="pword" required>
        
    <button type="submit" name="submit">Login</button>
    <button type="reset">Reset</button>
    
    <a class="pword" href="member_login.php">Login As member</a>
  </div>

  <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="rbutton"><a href="register.php">Register</a></button>
      <a class="pword" href="#">Forgot password?</a>
  </div>
</form>

<footer>
    <?php
        include('footer.html');
    ?>
</footer>
</body>
</html>
