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
	protected $query_1 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State 
				FROM aca_mab 
				WHERE Valid_Until = ?";		// used for testing
	protected $query_2 = "SELECT Mac_ID, Valid_From, Valid_Until, Aca_ID, User_ID , State 
				FROM aca_mab 
				WHERE Valid_Until != ?";	// used for testing
	protected $query_3 = "SELECT am.Mac_ID, au.Fname, au.Lname, a.ACA_Name, a.ACA_Bname, am.Valid_From, am.State, amm.Action, am.Ticket
				FROM aca_mab as am
				JOIN aca_user as au
				USING (User_ID)
				JOIN aca as a
				ON a.Aca_ID = au.Aca_ID
				JOIN aca_mab_metadata as amm
				ON am.Mac_ID = amm.Mac_ID
				WHERE am.Valid_Until = ?
				ORDER BY am.Valid_From ASC";	// general lookup
	protected $query_4 = "SELECT amm.Mac_ID, amm.Note, amm.Ticket, amm.Action
				FROM aca_mab_metadata as amm
				WHERE amm.Mac_ID = ?
				ORDER BY amm.Mac_ID ASC";
	protected $query_5 = "SELECT am.Mac_ID, au.Fname, au.Lname, a.ACA_Name, a.ACA_Bname, am.Valid_From, am.State, amm.Action, am.Ticket
				FROM aca_mab as am
				JOIN aca_user as au
				USING (User_ID)
				JOIN aca as a
				ON a.Aca_ID = au.Aca_ID
				JOIN aca_mab_metadata as amm
				ON am.Mac_ID = amm.Mac_ID
				WHERE am.Valid_Until = '1000-01-01 00:00:00' AND   CONCAT( Fname,  ' ', Lname ) LIKE  ?
				ORDER BY am.Valid_From ASC";
	protected $query_6 = "SELECT am.Mac_ID, au.Fname, au.Lname, a.ACA_Name, a.ACA_Bname, am.Valid_From, am.State, amm.Action, am.Ticket
				FROM aca_mab as am
				JOIN aca_user as au
				USING (User_ID)
				JOIN aca as a
				ON a.Aca_ID = au.Aca_ID
				JOIN aca_mab_metadata as amm
				ON am.Mac_ID = amm.Mac_ID
				WHERE am.Valid_Until = '1000-01-01 00:00:00' AND  am.Mac_ID LIKE  ?
				ORDER BY am.Valid_From ASC";
	protected $results;
	
  	function __construct($sqlQuery,$sqlWhere) {
	  if ($sqlQuery == "query_1") {
		  $this->sqlquery($this->query_1, $sqlWhere);
	  } elseif ($sqlQuery == "query_2") {
		  $this->sqlquery($this->query_2, $sqlWhere);
	  } elseif ($sqlQuery == "query_3") {
		  $this->sqlquery($this->query_3, $sqlWhere);
	  } elseif ($sqlQuery == "query_4") {
		  $this->mac2int_1($sqlWhere);
		  $this->sqlquery($this->query_4, $this->int_1);
	  } elseif ($sqlQuery == "query_5") {
		  $sqlWhere = '%' . $sqlWhere . '%';	// adds formating needed for sql searches
		  $this->sqlquery($this->query_5, $sqlWhere);
	  } elseif ($sqlQuery == "query_6") {
		  $this->mac2int_1($sqlWhere);
		  $this->int_1 = '%' . $this->int_1 . '%';	// adds formating needed for sql searches
		  $this->sqlquery($this->query_6, $this->int_1);
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
	  //echo "NUMBER OF ROWS    " . $num_of_rows . "<br />";	// debug
	  //echo "NUMBER OF FIELDS    " . $num_of_fields . "<br />";	// debug
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
	   foreach($this->results as $i => $item) {
		   if ($this->results[$i]['Mac_ID']) {
			   $this->int2mac_1($this->results[$i]['Mac_ID']);
			   $this->mac_1 = str_split($this->mac_1, 2);
			   $this->mac_1 = implode(':', $this->mac_1);
			   $this->mac_1 = strtoupper($this->mac_1);
			   $this->results[$i]['Mac_ID'] = $this->mac_1;  
		   }
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
	  //echo "THIS WAS PASSED    " . $int_1; //	debug
	  $this->mac_1 =  base_convert($int_1, 10, 16);
	  //echo "CONVERTED TO BASE 16     " . $this->mac_1;	// debug
	  
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
	//print_r($db->results);	// debug
	echo json_encode($db->results);
}
?>
