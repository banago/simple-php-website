<?php
header('Content-Type: text/html; charset=utf-8');
class mysqlquery {
	protected $mac_1;
  	protected $int_1;
	protected $db_s_1 = 'sql'; 	// db server dns name
	protected $db_su_1 = 'demoUser';	// db username
	protected $db_sp_1 = 'demoPassword';	// db password
	protected $db_sd_1 = 'MAB_TRACK';	// db database name
	protected $serchtype_1 = "Valid_Until";
	protected $searchterm_1;
	protected $query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab WHERE Valid_Until = ?";
	protected $resultrow = array();
  	function __construct($sqlQuery,$sqlWhere) {
	  if ($sqlQuery == "query_1") {
		  $this->sqlquery($this->query_1, $sqlWhere);
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }	
  }
   function sqlquery($Query, $sqlWhere) {
	  $this->searchterm_1 = $sqlWhere;
	  $db = new mysqli($this->db_s_1, $this->db_su_1, $this->db_sp_1, $this->db_sd_1);
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
if (isset($_GET['sqlQuery']) & isset($_GET['sqlWhere'])) {
	$db = new mysqlquery($_GET['sqlQuery'], $_GET['sqlWhere']);	// sets class property
	}	
}
?>
