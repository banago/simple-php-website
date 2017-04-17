<?php
header('Content-Type: text/html; charset=utf-8');
class mysqlquery {
	protected $mac_1;
  	protected $int_1;
	protected $serchtype_1 = "Valid_Until";
	protected $searchterm_1;
	protected $query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab WHERE Valid_Until = ?";
	protected $resultrow = array();
  	function __construct($sqlQuery,$sqlSearchterm) {
	  if ($sqlQuery == "query_1") {
		  $this->sqlquery($this->query_1, $sqlSearchterm);
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }	
  }
   function sqlquery($Query, $searchTerm) {
	  $this->searchterm_1 = $searchTerm;
	  $db = new mysqli('sql', 'demoUser', 'demoPassword', 'MAB_TRACK');
 	  $stmt = $db->prepare($Query);
	  $stmt->bind_param('s', $this->searchterm_1);
	  $stmt->execute();
	  $stmt->store_result();
	  $this->stmt_bind_assoc($stmt, $this->resultrow);
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

//$db = new mysqlquery("1000-01-01 00:00:0");
if (isset($_GET['sqlQuery']) & isset($_GET['sqlData'])) {
	$db = new mysqlquery($_GET['sqlQuery'], $_GET['sqlData']);	// sets class property
	}	
}
?>
