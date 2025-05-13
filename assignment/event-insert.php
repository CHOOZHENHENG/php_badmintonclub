<?php 

$event_name = "";
$date = "";
$time = "";
$member_price = "";
$non_member_price = "";
$contact = "";
$error = "";



// Check if the form has been submitted:
if (!empty($_POST)){
    
    $event_name = trim($_POST['event_name']);
    $date = trim($_POST['date']);
    $time= trim($_POST['time']);
    $member_price = trim($_POST['member_price']);
    $non_member_price = trim($_POST['non_member_price']);
    $contact = trim($_POST['contact']);
    
      $error = array();
      if($event_name == null){
          $error['event_name'] = 'Please enter the <strong>Event Name</strong>.';
      }
      if($date == null){
          $error['date'] = 'Please enter the <strong>Event Date</strong>.';
      }
      if($time == null){
          $error['time'] = 'Please enter the <strong>Event Time</strong>.';
      }
      if($member_price == null){
          $error['member_price'] = 'Please enter the <strong>Member Price</strong>.';
      }
       if($non_member_price == null){
          $error['non_member_price'] = 'Please enter the <strong>Non-Member Price</strong>.';
      }
      if($contact == null){
          $error['contact'] = 'Please enter the <strong>Contact Information</strong>.';
      }
      
      if (empty($error)){
          require_once('mySqli_connect.php');
          
          $q = "INSERT INTO event_list" 
              ."(event_name, date, time, member_price, non_member_price, contact) "
                  ."VALUES ('$event_name', '$date', '$time', '$member_price', '$non_member_price', '$contact')";
          $r = mysqli_query($dbc, $q);
          
          if($r){
              echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Thank You!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The event has been recorded successfully.</p>'.
                      '</div>';
          }else{
               echo '<div style="background-color:#6CCA9B">'.
                      '<h1 tyle="text-align:center;font-size: 2em;">Stystem Error!</h1>'
                      . '<p class="error" style="text-align:center;font-size: 1em;color:black;">The event cannot be recorded due to a system error.</p>'.
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
        <link rel="stylesheet" type="text/css" gref="css/style.css"/>
    <title>Insert New Event</title>
    <link href="reset.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
    
    <header>
        <?php
            include('admin_header.html');
        ?>
        </header>
    
    <body>
        <form action="event-insert.php" method="post">
            <br>
                <h1 style="color: blue">Insert Event Record</h1>
                <hr>
                <table border="1" cellpadding="7" cellspacing="0">
                    <tr>
                        <td>Event Name:</td>
                        <td>
                            <input type="text" name="event_name" id="event_name" value="<?php echo $event_name; ?>" maxlength="30" />
                        </td>
                    </tr>
                <tr>
                    <td>Date (yyyy-mm-dd):</td>
                    <td>
                        <input type="text" name="date"  id="date" placeholder="yyyy-mm-dd" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $date; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Time (hh:mm):</td>
                    <td>
                        <input type="text" name="time"  id="time" placeholder="hh:mm" min="7:00" max="24:00" value="<?php echo $time; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Member Price (Currency:RM):</td>
                    <td>
                        <input type="text" name="member_price"  id="member_price" placeholder="000.00" min="0.00" max="999.99" value="<?php echo $member_price; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Non-Member Price (Currency:RM):</td>
                    <td>
                        <input type="text" name="non_member_price"  id="non_member_price" placeholder="000.00" min="0.00" max="999.99" value="<?php echo $non_member_price; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td>
                        <input type="text" name="contact" id="contact" placeholder="name (phone.no)" value="<?php echo $contact; ?>"/>
                    </td>
                </tr>
                </table>
                <div>
                    <input type="submit" name="Insert" value="Insert" />
            <input type="button" name="Cancel" value="Back to Event List" onclick="location='admin-event-booking-list.php'" />
                </div>
        </form>

        <footer>
        <?php
            include('footer.html');
        ?>
        </footer>
    </body>
</html>