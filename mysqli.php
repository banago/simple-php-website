<?php
class sqlquery {
	protected $mac_1;
  protected $int_1;
	protected $serchtype_1;
	protected $query_1;
  function __construct($function) {
	  if ($function == "sqlMAC") {
		  $this->mac2int_1();
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }
	  @$db = new mysqli('sql', 'demoUser', 'demoPassword', 'MAB_TRACK');
		$this->serchtype_1 = "Valid_Until"; 	
	  $this->query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State 
		FROM aca_mab 
		WHERE this->serchtype_1 = ?";
		echo $this->query_1;
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
b = new sqlquery("cats");
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
