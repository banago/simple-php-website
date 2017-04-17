<?php
header('Content-Type: text/html; charset=utf-8');
class mysqlquery {
	protected $mac_1;
  protected $int_1;
	protected $serchtype_1;
	protected $searchterm_1;
	protected $query_1;
	protected $resultrow = array();
  function __construct($a,$b,$c) {
	  if ($function == "sqlMAC") {
		  $this->mac2int_1();
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }
	  $db = new mysqli('sql', 'demoUser', 'demoPassword', 'MAB_TRACK');
	  $this->serchtype_1 = $a;
          $this->searchterm_1 = $b;
	  $this->query_1 = $c;
 	  $stmt = $db->prepare($this->query_1);
	  $stmt->bind_param('s', $this->searchterm_1);
	  $stmt->execute();
	  $stmt->store_result();
	  $this->stmt_bind_assoc($stmt, $this->$resultrow);
	  while($stmt->fetch()) {
    	  	print_r($this->resultrow);
	  }
		
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
  function stmt_bind_assoc (&$stmt, &$out) {
    $data = mysqli_stmt_result_metadata($stmt);
    $fields = array();
    $out = array();

    $fields[0] = $stmt;
    $count = 1;

    while($field = mysqli_fetch_field($data)) {
        $fields[$count] = &$out[$field->name];
        $count++;
    }
    call_user_func_array(mysqli_stmt_bind_result, $fields);
}
}

$db = new mysqlquery("Valid_Until", "1000-01-01 00:00:0", "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab WHERE $tserchtype_1 = ?");
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
