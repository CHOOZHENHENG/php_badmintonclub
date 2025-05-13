<?php
function detectInputError($adminID, $pswd)
    {
        $error = array();
        $id = "12BAD34567";
        $a_pswd = "badminton";

        if(strcmp($adminID, $id) != 0)
        {
            $error['$adminID'] = '<br><strong>User ID<strong> is of invalid format. Format: 99XXX99999.';
        }

        if(strcmp($pswd, $a_pswd) != 0)
        {
            $error['$pswd'] = '<strong>Password</strong> is a invalid Password';
        }

        return $error;
    }

if(isset($_POST['submit']))
        {
            $adminID = trim($_POST['uname']);
            $pswd = trim($_POST['pword']);
            
            $error = detectInputError($adminID, $pswd);
            
            if (empty($error))
            {
		header("Location: admin-profile.php");
		exit();
            }
            
            else
            {
                printf('<br><h1>OOPS... There are input errors</h1>
                        <ul style="color: red"><li>%s</li></ul>
                        <p>[ <a href="javascript:history.back()">Back</a> |</p>',
                        implode('</li><li>', $error));
                
            }
        }
else
        {
            header("Location: admin-profile.php");
	    exit();
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1252">
        <title>Admin login check</title>
        <link href="reset.css" rel="stylesheet" type="text/css">
        <link href="register.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
    <header>
       <?php
            include('header.html');
        ?>
    </header>
    
    <body>
        
    <footer>
         <?php
            include('footer.html');
        ?>
    </footer>
    </body>
</html>