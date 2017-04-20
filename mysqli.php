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
	protected $query_2 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State FROM aca_mab WHERE Valid_Until != ?";
	protected $query_3 = "SELECT a.Aca_ID, am.Mac_ID, au.User_ID, au.Fname, au.Lname, au.Type,
 		am.Valid_From, am.Valid_Until, am.State, 
 		amm.Note,  amm.Action 
  		FROM aca as a, aca_user as au, aca_mab as am, aca_mab_metadata as amm 
    		WHERE am.Valid_Until = ? AND a.Aca_ID = au.Aca_ID 
      		AND au.Aca_ID = am.Aca_ID AND am.Mac_ID = amm.Mac_ID";
	protected $results;
	
  	function __construct($sqlQuery,$sqlWhere) {
	  if ($sqlQuery == "query_1") {
		  $this->sqlquery($this->query_1, $sqlWhere);
	  } elseif ($sqlQuery == "query_2") {
		  $this->sqlquery($this->query_2, $sqlWhere);
	  } elseif ($sqlQuery == "query_3") {
		  $this->sqlquery($this->query_3, $sqlWhere);
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
	  $stmt->store_result();	// store the result (to get properties)
	  $num_of_rows = $stmt->num_rows; // set the number of rows
	  $num_of_fields = $stmt->field_count;	// set the number of fields
	  echo "NUMBER OF ROWS    " . $num_of_rows . "<br />";
	  echo "NUMBER OF FIELDS    " . $num_of_fields . "<br />";
	  //$stmt->bind_result($id, $first_name, $last_name, $username, $a2 ,$a3 , $a4, $a5, $a6, $a7, $a11);	// Bind the result to variables
	  $x = 0;
	  $meta = $stmt->result_metadata();
	  $parameters = array();
	  while($field = $meta->fetch_field()) {
    		$parameters[] = &$row[$field->name];
	  } 
	   //$stmt->bind_result(array_values($array));	// Bind the result to variables
	   call_user_func_array(array($stmt, 'bind_result'), $parameters);
	   while($stmt->fetch()) { 
		   $x = array();
                   foreach($row as $key => $val ) {
                        // This next line isn't necessary for your project. 
                        // It can be removed. I use it to ensure
                        // that the "excerpt" of the post doesn't end in the middle
                        // of a word. 
                        if ( $key === 'excerpt') $val = $this->cleanExcerpt($row[$key]);
                        $x[$key] = $val;
		    }
                    $this->results[] = $x;
	   }
	   //print_r ($this->results); 
	   //return $results; 
	   $stmt->free_result();
	   $stmt->close();
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
	print_r($db->results);
}
?>
