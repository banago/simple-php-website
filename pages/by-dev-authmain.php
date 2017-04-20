<?php
class authmain {
  protected $db_s_1 = 'sql';
  protected $db_su_1 = 'demoUser';
  protected $db_sp_1 = 'demoPassword';
  protected $db_sd_1 = 'MAB_TRACK';
  protected $query_1_name;
  protected $query_1_password;  
  protected $query_1 = "SELECT au.Fname, au.Fname, au.User_ID, aup.Password 
  FROM aca_user as au, aca_user_password as aup 
  WHERE au.Fname = ? AND au.Type = 'ADMINISTRATOR' AND au.User_ID = aup.User_ID AND aup.Password=sha1(?)";
  protected $mac_1;
  protected $mac_2;
	
  function __construct($userid,$password) {
    $this->query_1_name = $password;
    $this->query_1_password = $password;
    $this->validate($query_1);
  }
  function __get($name){
	  return $this->$name;
  }	// used to get properties
  function __set($name,$value){
	  return $this->$name = $value;
  }	// used to set properties
  
  function validate() {
    $db = new mysqli($this->db_s_1, $this->db_su_1, $this->db_sp_1, $this->db_sd_1);
    $stmt = $db->prepare($Query);
    $stmt->bind_param('ss', $this->query_1_name,$this->password);
    $stmt->execute();
    if (mysqli_connect_errno()) {
      echo 'Connection to database failed:' . mysqli_connect_error();
      exit();
    }
    $result = $stmt->query($this->query_1);  // executes query
    if ($db->num_rows) {
      // if they are in the database register the user id
      $row = $db->fetch_assoc();  // stores result of successfull query
      if ($row['Fname'] == $userid) {
        $_SESSION['valid_user'] = $userid;  // sets session to returned username
        $_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME;  // idle timeout
      } else {
        echo "UserName <font color=\"red\"><b>" . $userid . "</b> </font>" . " <ins>Not Found</ins>";
      } 
    } else { 
      echo "THIS IS THE QUERY    :" . $this->query_1; // debug
    }
    $db->close();  // closes the db connection
  }   
}
if (isset($_POST['userid']) && isset($_POST['password'])) {
  define('MAX_IDLE_TIME', '5'); // max user idle time in seconds
  // if the user has justed tried to log in
  $userid = strtoupper($_POST['userid']); // makes user name uppercase
  $password = $_POST['password'];
  $auth = new authmain($userid, $password);
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
