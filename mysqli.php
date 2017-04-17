<?php
header('Content-Type: text/html; charset=utf-8');
class mysqlquery {
	protected $mac_1;
  protected $int_1;
	protected $serchtype_1;
	protected $searchterm_1;
	protected $query_1;
  function __construct() {
	  if ($function == "sqlMAC") {
		  $this->mac2int_1();
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }
	  @$db = new mysqli("sql", "demoUser", "demoPassword", "MAB_TRACK");
	  $this->serchtype_1 = "Valid_Until"; 
	  $this->searchterm_1 = "\'1000-01-01 00:00:0\'";
	  $this->query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab";
	  echo $this->query_1;
	  $test = $this->query_1;
	  $test2 = $this->searchterm_1;
	  $stmt = $db->prepare($test);
	  $stmt->bind_param('s',$test2);
	  $stmt->execute();
		
  }
  function __get($name){
	  return $this->$name;
  }	// used to get properties
  function __set($name,$value){
	  return $this->$name = $value;
  }	// used to set properties
  function mac2int_1($mac1) {
	  $this->int_1 = base_convert($mac1, 16, 10);
  }
  function int2mac_1($int_1) {
	  $this->mac_1 =  base_convert($int_1, 10, 16);
  }
}
//$db = new mysqlquery();
$db = new mysqli('sql', 'demoUser', 'demoPassword', 'MAB_TRACK');
//mysqli_set_charset($db,"utf8");
//$db->set_charset("utf8");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$serchtype_1 = "Valid_Until";
$searchterm_1 = "\'1000-01-01 00:00:0\'";
$query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab WHERE $serchtype_1 = ?";
echo "THIS IS THE query_1:  " . $query_1;
$stmt = $db->prepare($query_1);
$stmt->bind_param('s',$searchterm_1);
$stmt->execute();
printf("%d Row inserted.\n", $stmt->affected_rows);
if ($result = $db->query($query_1)) {

    /* fetch object array */
    while ($obj = $result->fetch_object()) {
        printf ("%s (%s)\n", $obj->Mac_ID, $obj->Valid_From);
    }

    /* free result set */
    $result->close();
}
$stmt->close();

//$con = mysqli_connect("sql","demoUser","demoPassword","MAB_TRACK");
//echo "Default character set is: " . $charset;

/* close connection */
$db->close();
//$serchtype_1 = "Valid_Until"; 
//$searchterm_1 = "aca_mab";
//$query_1 = "SELECT * FROM ?";
//$stmt = $db->prepare($query_1);
//$stmt->bind_param('s',$searchterm_1);
//$stmt->execute();
if (isset($_GET['Type']) & isset($_GET['curlAddress']) & isset($_GET['curlData']) 
    & isset($_GET['curlCustom']) & isset($_GET['curlPost'])) {
	$a = new sqlquery($_GET['Type']);	// sets class property
	//echo $_GET['Type'] . "<br />";	// debug
	$a->curlAddress = $_GET['curlAddress'];	// sets class property
	//echo $_GET['curlAddress'] . "<br />";	// debug
	//echo $_GET['curlData'] . "<br />";	// debug
	$a->curlCustom =$_GET['curlCustom'];	// sets class property
	//echo $_GET['curlCustom'] . "<br />";	// debug
	$a->curlPost = $_GET['curlPost'];	// sets class property
	//echo $_GET['curlPost'] . "<br />";	// debug
		if ($_GET['Type'] == "primeTicket_1") {
		$a->curlData = "(" . $_GET['curlData'] . ")";	// formats user input
		$a->primeCurl_1();	// calls the correct function based on the GET type
	} elseif ($_GET['Type'] == "iseTicket_1") {
		$a->curlData = $_GET['curlData'];	// formats user input
		$a->iseCurl_1();	// calls the correct function based on the GET Type
	} elseif ($_GET['Type'] == "apicTicket_1") {
		$a->curlData = $_GET['curlData'];	// formats user input
		$a->apicCurl_1();	// calls the correct function based on the GET tpe
	}	
}
?>
