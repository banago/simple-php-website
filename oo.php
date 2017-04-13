<?php
class curlauth {

  protected $attribute1;

  protected $attribute2;
  
  protected $curlAddress;
  
  protected $curlData;
  
  protected $curlCustom;
  
  protected $curlPost;
  
  protected $curlHTTP;
	
  protected $ticket;
	
  protected $response;
	
	

  function operation1 () {

  }

  function operation2 () {

  }

  function __construct($function) {
	  if ($function == "apicTicket_1") {
		  $this->apicTicket_1();
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  }
	  //echo "Constructor called with parameter ".$param."<br />";
	  //$this->$response = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP);
	  //$this->apicTicket_1();
	  //return $this->apicTicket_1();
  }
  function __get($name){
    return $this->$name;
  }
  function __set($name,$value){
    return $this->$name = $value;
  }
  function myCurl() {
    	//echo "curlAddress myCurl  ::" . $this->curlAddress . "<br>";	// debug
	//echo "curlData myCurl  ::" .  $this->curlData . "<br>";	// debug
	//echo "curlCustom myCurl  ::" .  $this->curlCustom . "<br>";	// debug
	//echo "curlPost myCurl  ::" .   $this->curlPost . "<br>";	// debug
	//echo "curlHTTP myCurl  ::" .   print_r($this->curlHTTP) . "<br>";	// debug
	//echo "FULLLcurlAddress myCurl  ::" .   $this->curlAddress . $curlData . "<br>"; // debug
	$curl = curl_init();    
	curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => false,    // disables ssl server cert verify check
        	CURLOPT_SSL_VERIFYHOST => false,    // disables ssk host cert verify check
        	CURLOPT_URL => $this->curlAddress . $this->curlData,
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 300,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => $this->curlCustom,
        	CURLOPT_POSTFIELDS => $this->curlPost,
        	CURLOPT_HTTPHEADER => $this->curlHTTP, // restAuth contains the auth Tokens. This also need to be update to return JSON instead of include
    	));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
	    //echo "RESPONSE   " .  $response;	// debug
	    return $response;    
    } 
  }
  function primeCurl_1($response) {
    if ($array['http-code'] == 500) {
        echo print_r($array);
    } else {
      $json = json_decode($response, true);
      //print_r($json);  // debug
      //echo $response;  // debug
      //echo $json['vlanId']['associationTime']; // debug
      $match = array("NAS Interface :"=>'clientInterface',"NAS Connection Type :"=>'connectionType',
                     "NAS IP :"=>'deviceIpAddress',"NAS Name :"=>'deviceName',
                     "EndPoint Type :"=>'deviceType',"EndPoint IP :"=>'ipAddress',                      
                     "EndPoint MAC :"=>'macAddress',"EndPoint NAC :"=>'securityPolicyStatus',
                     "EndPoint OUI :"=>'vendor',"EndPoint VLAN:"=>'vlan');
      //echo $json['queryResponse']['entity']['0']['clientsDTO']['securityPolicyStatus'] . "\r\n";   // debug
      //echo print_r($json) . "\r\n";    // debug
      if (isset($json['queryResponse']['entity'])) {
        for ($i = 0; $i < count($json['queryResponse']['entity']); $i++) {
          //echo "How many response: " . count($json['response']) . "<br>";	// debug
          echo "<br>";
          echo "Array Element: " . $i . "<br>";  
          echo "<br>";    
          foreach ($match as $x => $item) {
            echo "<b>" . $x . "</b>" . "  " . $json['queryResponse']['entity']['0']['clientsDTO'][$item] . "<br>"; 
          }
        }
        echo "<p>" . "</p>" . "<p>" . "</p>";
      } else {
          echo "Unable to locate record for : " . "<font color=\"red\">" . $data . "</font>";
          echo "<p>" . "</p>" . "<p>" . "</p>";
      }  
    }  
  }
	function primeTicket_1(){
   		$auth_1 ="B1@ck_Sn@k3_M0@n"; 	// populate with a ticket
		$cache_1 ="cache-control: no-cache"; 	// populate with needed information
    		$arr = array('serviceTicket' => $auth_1, 'serviceCache' => $cache_1);	// create array for JSON
    		//return json_encode($arr);		// return JSON   
		$this->ticket = json_encode($arr);
	}
	function apicTicket_1(){
		$this->curlAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
		$this->curlData = "/ticket";
		$this->curlCustom = "POST";
		$this->curlPost = "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}";
		$this->curlHTTP = array(
        		"cache-control: no-cache",	
        		"content-type: application/json");
    		$response = $this->myCurl();
		$json = json_decode($response, true);
		//print_r($json);	// debug
		$arr = array('serviceTicket' => $json['response']['serviceTicket'], 'idleTimeout' => $json['response']['idleTimeout'], 
								 'sessionTimeout' => $json['response']['sessionTimeout'], 'sessionVersion' => $json['version']);	// create array for JSON
		//echo json_encode($arr);		// return JSON
				// debug
		$this->ticket = json_encode($arr);
		//print_r($this->ticket);	// debug
		//$this->ticket = json_decode($this->ticket,true);	// debug
		//print_r($this->ticket);	// debug
		
	}
}
$a = new curlauth("primeTicket_1");
$ticket = json_decode($a->ticket, true);
print_r($ticket);
//echo "attemping to print  " . print_r($a->ticket);
//echo "decoding   " .  json_decode($a->ticket,true);
//echo "decoding somemore   " .  json_decode($a->ticket['response']['serviceTicket'],true);
//echo json_decode($a->ticket,yes);
//$b = new curlauth("kalB"); 
//$a->attribute = 5;
//$b->attribute = 15;
//echo $a->attribute;
//echo $b->attribute;
//echo $a->primeTicket_1();
//$a->$curlAddress = "this is a big test";
//echo $a->$curlAddress;
if (isset($_GET['curlAddress']) & isset($_GET['curlData'])
	& isset($_GET['curlCustom']) & isset($_GET['curlPost'])) {
	$c = new curlauth();
	$c->curlAddress = $_GET['curlAddress'];
	$c->curlData = "(" . $_GET['curlData'] . ")";
	$c->curlCustom =$_GET['curlCustom'];
	$c->curlPost = $_GET['curlPost'];
}

?>

