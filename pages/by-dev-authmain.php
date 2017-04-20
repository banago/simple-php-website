<?php
define('MAX_IDLE_TIME', '3600'); // max user idle time in seconds
class mysqlquery {
	protected $userid_1;
  protected $type_1;
  protected $password_1;
	protected $db_s_1 = 'sql'; 	// db server dns name
	protected $db_su_1 = 'demoUser';	// db username
	protected $db_sp_1 = 'demoPassword';	// db password
	protected $db_sd_1 = 'MAB_TRACK';	// db database name
	protected $serchtype_1 = "Valid_Until";
	protected $searchterm_1;
	protected $query_1 = "SELECT au.Fname, au.User_ID, au.Type, aup.Password FROM aca_user as au, aca_user_password as aup WHERE au.Fname = ? AND au.User_ID = aup.User_ID AND au.Type = ? AND Password=sha1(?)";
	protected $resultrow = array();
  	
  function __construct($uid,$upw) {
		$this->userid_1 = $uid;
		$this->password_1 = $upw;
		$this->type_1 = "ADMINISTRATOR";
	  $this->sqlquery();
  }
   function sqlquery() {
     $db = new mysqli($this->db_s_1, $this->db_su_1, $this->db_sp_1, $this->db_sd_1);
     if (mysqli_connect_errno()) {
       echo 'Connection to database failed:' . mysqli_connect_error();
       exit();
     }
    $query = "SELECT au.Fname, au.User_ID, au.Type, aup.Password FROM aca_user as au, aca_user_password as aup WHERE au.Fname = ? AND au.User_ID = aup.User_ID AND au.Type = ? AND Password=sha1(?)";
    $stmt = $db->prepare($this->query_1);
    $stmt->bind_param('sss', $this->userid_1, $this->type_1, $this->password_1);
    $stmt->execute();
    $stmt->store_result();
    $numRows = $stmt->num_rows;
    $stmt->bind_result($Fname, $User_ID, $Type, $Password);
    $stmt->fetch();
    if ($numRows > 0) {
      $_SESSION['valid_user'] = $this->userid_1;  // sets session to returned username
      $_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME;  // idle timeout
      //echo "Fname   " . $Fname . "<br />";  // debug
      //echo "User_ID  " . $User_ID . "<br />"; //debug
      //echo "Type " . $Type . "<br />";  // debug
      //echo "Password Hash  " . $Password . "<br />";  // debug
    } else {
      //echo "Number of rows returned  " . $numRows;  // debug
    }
    $db->close();  // closes the db connection
	 }

  function __get($name){
	  return $this->$name;
  }	// used to get properties
  function __set($name,$value){
	  return $this->$name = $value;
  }	// used to set properties

  
}


if (isset($_POST['userid']) && isset($_POST['password'])) {
	$userid = strtoupper($_POST['userid']); // makes user name uppercase
  $password = $_POST['password'];
	$db = new mysqlquery($userid, $password);	// sets class property
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
