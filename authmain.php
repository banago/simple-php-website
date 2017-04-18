<?php
session_start();
if (isset($_POST['userid']) && isset ($_POST['password'])) {
  // if the user has justed tried to log in
  $userid = $_POST['userid'];
  $password = $_POST['password'];
  
  $db_conn = new mysqli('localhost', 'webauth', 'webauth','auth');
  if (mysqli_connect_errno()) {
    echo 'Connection to database failed:' . mysqli_connect_error();
    exit();
  }
  $query = "SELECT * FROM authorized_users WHERE name = '" . $userid . "' AND password=sha1('".$password."')";
  $result = $db_conn->query($query);
  $if ($result->num_rows) {
    // if they are in the database register teh user id
    $_SESSION['valid_user'] = $userid
  }
  $db_conn->close();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <style type ="text/css">
      fieldset {
        width: 50%;
        border: 2px solid #ff0000;
      }
      legend {
        font-weight: bold;
        font-size: 125%;
      }
      label {
        width: 125px;
        float: left;
        text-align: left;
        font-weight: bold;
      }
      input {
        border: 1px solid #000;
        padding: 3px;
      }
      button {
        margin-top: 12px;
      }
      </style>
    </head>
  <body>
    <h1> Home Page</h1>
    <?php
    if (isset($_SESSION['valid_user'])) {
    echo '<p>You are logged in as: '.$_SESSION['valid_user'] . ' <br />';
    echo '<a href="logout.php">Log Out</a></p>';
    } else {
      if (isset($userid)) {
      // if they've tried and failed to log in
      echo '<p>You are not logged in.</p>';
    }
      // provide form to log in
      echo '<form action="authmain.php" method="post">';
      echo '<fieldset>';
      echo '<legend>Login Now!</legend>';
      echo '<p><label for="userid">UserID:</label>';
      echo '<input type="password" name="password" id="password" size="30"/></p>';
      echo '<fieldset>';
      echo '<button type="submit" name="login">Login</button>';
      echo '</form>';
    }                        
    ?>
    <p><a href="members_only.php">Go to Members Section</a></p>  
  </body>
  </html>
