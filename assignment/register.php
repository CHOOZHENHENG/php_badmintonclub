<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Register</title>
        <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link href="register.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        <link href="#" rel="stylesheet" type="text/css">
    </head>

    <header>
        <?php
            include('header.html');
        ?>
    </header>
    
    <body>
        <form id="login" action="handle_register_form.php" method="post">
            <div class="form">
                <h1>Register</h1>

                <p>Please fill in this form to <b>register as a member.</b></p>
                <hr>
                <label for="StudentID"><b>Student ID</b></label>
                <input type="text" name="studentID" id="studentID" placeholder="15AAD04646" required/>

                <label for="name"><b>Name</b></label>
                <input type="text" name="name" id="Name" placeholder="Tan Ah Kow" required/>

                <label for="email"><b>TARUC Email Address</b></label>
                <input type="email" name="memberEmail" id="email" required /> 
                
                <label for="gender"><b>Gender</b></label><br>
                <input type="radio" name="gender" value="M" required/>Male
                <input type="radio" name="gender" value="F" required/>Female<br><br>
                
                <label for="password"><b>Password</b></label>
                <input type="password" name="password" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,15}"
                       title="Must contain at least one number, one uppercase, one lowercase letter, one special characters and between 8 and 15 characters"><br>
                
                <label for="password"><b>Confirm Password</b></label>
                <input type="password" name="confirmPassword" required><br><br>
                <hr>

                <input type="submit" class="register" name="submit" value="REGISTER"/>

                <input type="reset" class="cancel" name="cancel "value="CANCEL"/>
            </div>
        </form>
        
        <footer>
            <?php
            include('footer.html');
        ?>
        </footer>
    </body>
</html>
