<?php
if (isset($_POST['userid']) && isset($_POST['password'])) {
  define('MAX_IDLE_TIME', '3600'); // max user idle time in seconds
  // if the user has justed tried to log in
  $userid = strtoupper($_POST['userid']); // makes user name uppercase
  $password = $_POST['password'];
  $type = "ADMINISTRATOR";
  $name = "Fname";
  
  $db = new mysqli('sql', 'demoUser', 'demoPassword','MAB_TRACK');
  if (mysqli_connect_errno()) {
    echo 'Connection to database failed:' . mysqli_connect_error();
    exit();
  }
  $query = "SELECT au.Fname, au.User_ID, aup.Password FROM aca_user as au, aca_user_password as aup WHERE au.Fname = ? AND au.Type = ? AND au.User_ID = aup.User_ID AND aup.Password=sha1(?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param('sss', $userid, $type, $password);
  $stmt->execute();
  //$stmt->bind_result($Fname);
  $stmt->fetch();
  //echo $stmt->fullQuery;
  //echo $stmt->error;
  //$result = $stmt->get_result();
  $numRows = $stmt->num_rows;
  $stmt->bind_result($Fname,$User_ID,$Password); 
if($numRows > 0) {
  while ($stmt->fetch()) {
    $name1[] = $Fname;
    $name2[] = $User_ID;
    $name3[] = $Password;
    echo  $name1['Fname'];
  }
}
  //$result = $db->query($query);  // executes query
  if ($stmt->num_rows) {
    // if they are in the database register the user id
    $row = $stmt->fetch_assoc();  // stores result of successfull query
    if ($row['Fname'] == $userid) {
      $_SESSION['valid_user'] = $userid;  // sets session to returned username
      $_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME;  // idle timeout
    } else {
      echo "UserName <font color=\"red\"><b>" . $userid . "</b> </font>" . " <ins>Not Found</ins>";
    }
  } else {
    echo "THIS IS THE QUERY    :" . $stmt->fullQuery; // debug
  }
  $db->close();  // closes the db connection
}
?>
<!DOCTYPE html>

  <head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    </head>
  <body>
    <h1> Authentication Required</h1>
    <?php // there is a better way to write this, rewrite it...
    
    if (isset($_SESSION['valid_user'])) {   
      if ($_SESSION['timeout_idle'] < time()) {
        session_destroy();
        echo "Your session has timed out please log in again" . "<br />";
        echo '<p><a href="/?page=by-dev-authmain">Go to Login Section</a></p>'; 
      } else {
        echo '<p>You are logged in as: '. $_SESSION['valid_user'] . ' <br />';  
        echo '<a href="/?page=by-dev-logout">Log Out</a></p>';
        echo '<p><a href="/?page=by-dev-ise-bypass">Go to Members Section</a></p>'; 
      }
    } else {
      if (isset($userid)) { 
        // if they've tried and failed to log in
        echo '<p>Could not log you in.</p>';
      } else {
        // they have not tried to log in yet or have logged out
        echo '<p>You are not logged in.</p>';
      }    
      // provide form to log in
      echo '<form action="/?page=by-dev-authmain" method="post">';
      echo '<fieldset>';
      echo '<legend>Login Now!</legend>';
      echo '<p><label for="userid">UserID:</label>';
      echo '<input type="text" name="userid" id="userid" size="30"/></p>';
      echo '<p><label for="password">Password:</label>';
      echo '<input type="password" name="password" id="password" size="30"/></p>';
      echo '<fieldset>'; 
      echo '<button type="submit" name="login">Login</button>';
      echo '</form>';
    } 
                     
    ?>
    
  </body>
