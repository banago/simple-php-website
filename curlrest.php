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
	protected $time;
  function __construct($function) {
	  if ($function == "apicTicket_1") {
		  $this->apicTicket_1();
	  } elseif ($function == "primeTicket_1") {
		  $this->primeTicket_1();
	  } elseif ($function == "iseTicket_1") {
		  $this->iseTicket_1();
	  }
	  $this->myTime("H",15);
	  //echo "Constructor called with parameter ".$param."<br />";
	  //$this->$response = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP);
	  //$this->apicTicket_1();
	  //return $this->apicTicket_1();
  }
  function __get($name){
    return $this->$name;
  }	// used to get properties
  function __set($name,$value){
    return $this->$name = $value;
  }	// used to set properties
  function myCurl() {
    	//echo "curlAddress myCurl  ::" . $this->curlAddress . "<br>";	// debug
	//echo "curlData myCurl  ::" .  $this->curlData . "<br>";	// debug
	//echo "curlCustom myCurl  ::" .  $this->curlCustom . "<br>";	// debug
	//echo "curlPost myCurl  ::" .   $this->curlPost . "<br>";	// debug
	//echo "curlHTTP myCurl  ::" .   print_r($this->curlHTTP) . "<br>";	// debug
	//echo "FULLLcurlAddress myCurl  ::" .   $this->curlAddress . $this->curlData . "<br>"; // debug
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
function myTime($format,$offset) {
	echo date('Y-m-d') . "<br />";	// debug data output
	echo date($format.':i:s') . "<br />";	// debug time output
	echo date("H:i:s", strtotime('-'.$offset.' minutes')) . "<br />"; 	// debug time ofset
	$notepad = "https://agaisepr01.fpicore.fpir.pvt/admin/API/mnt/Session/AuthList/2017-04-10 18:35:00/null";	// just a note to self
	$date = date('Y-m-d');	// creates current data
	$time = date("H:i:s", strtotime('-'.$offset.' minutes'));	// creates current time - offset time
	$this->time = $date." ".$time;	// populates attribute with correctl formated time
}
function apicCurl_1() {
   $response = $this->myCurl();
    if ($array['http-code'] == 500) {
        //echo print_r($array);		// debug
    } else {
	 $json = json_decode($response,true);
	//echo print_r($response);	// debug
	#echo $array['user_name'] . "<br>";	// debug
	$match = array("Serial Number :"=>'serialNumber',"Family :"=>'family',"Type :"=>'type',
			       "Inventory :"=>'inventoryStatusDetail',"MAC :"=>'macAddress',
			       "Role :"=>'role',"MgmT :"=>'managementIpAddress',
			       "Platform :"=>'platformId',"Reachablity :"=>'reachabilityStatus',
			       "HostName :"=>'hostname');	    	
	for ($i1 = 0; $i1 < 1; $i1++) {
	for ($i = 0; $i < count($json['response']); $i++) {
		//Debug
		//echo "How many response: " . count($json['response']) . "<br>";
		echo "<br>";
		echo "Array Element: " . $i . "<br>";
		echo "<br>";
		foreach ($match as $x => $item) {
			echo $x ."  " . $json['response'][$i][$item] . "<br>";		
		}		
	}
    }  
}}
function iseCurl_1() {
   $response = $this->myCurl();
    //echo $response;	// debug
    $xml = new SimpleXMLElement($response);
    //echo $xml->asXML();	// debug
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    //echo $dom->saveXML();	// debug
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    //echo print_r($array);	// debug
    if ($array['http-code'] == 500) {
        echo print_r($array);
    } else {
	// echo print_r($array);	// debug
	#echo $array['user_name'] . "<br>";	// debug
      $match = array("EndPoint Auth Status :" => 'passed',"EndPoint User :" => 'user_name',
			"EndPoint Authentication Status :"=>'passed',"EndPoint Auth Server :"=>'acs_server',
                        "EndPoint Auth Method :"=>'authentication_method',"EndPoint Auth Protocol :"=>'authentication_protocol',
                        "EndPoint Idendity Group :"=>'identity_group',"EndPoint IP :"=>'framed_ip_address',
                        "EndPoint Location :"=>'location',"EndPoint Type :"=>'device_type',
			"EndPoint Auth(Z) :"=>'selected_azn_profiles',"EndPoint SGT :"=>'cts_security_group',     
			"NAS IP :" => 'nas_ip_address',"NAS Name :"=>'network_device_name');	    	
	    for ($i1 = 0; $i1 < 1; $i1++) {
				foreach ($match as $x => $item) {
				 echo "<b>" . $x . "</b>" . "  " . $array[$item] . "<br>";
				}    
	    }
    }  
  }
  function primeCurl_1() {
	  $response = $this->myCurl();
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
	function iseTicket_1(){
   		$auth_1 ="B3_3@5y"; 	// populate with a ticket
		$cache_1 ="cache-control: no-cache"; 	// populate with needed information
    		$arr = array('serviceTicket' => $auth_1, 'serviceCache' => $cache_1);	// create array for JSON
    		//return json_encode($arr);		// return JSON
		$arr = json_encode($arr);	// encode as JSON
		$arr = json_decode($arr,true);	// decode as jSON
		$this->curlHTTP = array($arr['serviceTicket']);
		//print_r($arr);	// debug
		//print_r($this->curlHTTP);	// debug
	}
	function primeTicket_1(){
   		$auth_1 ="B1@ck_Sn@k3_M0@n"; 	// populate with a ticket
		$cache_1 ="cache-control: no-cache"; 	// populate with needed information
    		$arr = array('serviceTicket' => $auth_1, 'serviceCache' => $cache_1);	// create array for JSON
    		//return json_encode($arr);		// return JSON
		$arr = json_encode($arr);	// encode as JSON
		$arr = json_decode($arr,true);	// decode as jSON
		$this->curlHTTP = array($arr['serviceTicket']);
		//print_r($arr);	// debug
		//print_r($this->curlHTTP);	// debug
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
		$this->ticket = json_decode($this->ticket, true);
		//print_r($this->ticket);	// debug
		$combined = "x-auth-token: ".$this->ticket['serviceTicket'];
		//echo "THIS IS THE KEY      " . 	$combined;	// debug
		$this->curlHTTP = array($combined);
		//print_r($this->ticket);	// debug
		//$this->ticket = json_decode($this->ticket,true);	// debug
		//print_r($this->ticket);	// debug
		
	}
}

$a = new curlauth("111");
echo $a->time;
//$b = new curlauth("primeTicket_1");
//$ticket = json_decode($a->ticket, true);
//print_r($a->ticket);
//print_r($b->ticket);

if (isset($_GET['Type']) & isset($_GET['curlAddress']) & isset($_GET['curlData']) 
    & isset($_GET['curlCustom']) & isset($_GET['curlPost'])) {
	$a = new curlauth($_GET['Type']);	// sets class property
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

