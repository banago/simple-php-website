<?php
class curlauth {

  protected $attribute1;

  protected $attribute2;
  
  protected $curlAddress;
  
  protected $curlData;
  
  protected $curlCustom;
  
  protected $curlPost;
  
  protected $curlHTTP;
	
  protected $response;
	
	

  function operation1 () {

  }

  function operation2 () {

  }

  function __construct() {

    //echo "Constructor called with parameter ".$param."<br />";
    //$this->$response = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP);
	  $this->apicTicket_1();

  }
  function __get($name){
    return $this->$name;
  }
  function __set($name,$value){
    return $this->$name = $value;
  }
  function myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP) {
    	echo "curlAddress myCurl  ::" . $curlAddress . "<br>";	// debug
	echo "curlData myCurl  ::" .  $curlData . "<br>";	// debug
	echo "curlCustom myCurl  ::" .  $curlCustom . "<br>";	// debug
	echo "curlPost myCurl  ::" .   $curlPost . "<br>";	// debug
	echo "curlHTTP myCurl  ::" .   $curlHTTP . "<br>";	// debug
	echo "FULLLcurlAddress myCurl  ::" .   $curlAddress . $curlData . "<br>"; // debug
	$curl = curl_init();    
	curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => false,    // disables ssl server cert verify check
        	CURLOPT_SSL_VERIFYHOST => false,    // disables ssk host cert verify check
        	CURLOPT_URL => $curlAddress . $curlData,
        	CURLOPT_RETURNTRANSFER => true,
        	CURLOPT_ENCODING => "",
        	CURLOPT_MAXREDIRS => 10,
        	CURLOPT_TIMEOUT => 300,
        	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        	CURLOPT_CUSTOMREQUEST => $curlCustom,
        	CURLOPT_POSTFIELDS => $curlPost,
        	CURLOPT_HTTPHEADER => array($curlHTTP), // restAuth contains the auth Tokens. This also need to be update to return JSON instead of include
    	));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
	    echo "RESPONSE   " .  $response;	// debug
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
    		return json_encode($arr);		// return JSON        
	}
	function apicTicket_1(){
		$curlHTTP = array(
        		"cache-control: no-cache",	
        		"content-type: application/json");
    		$curlPost = "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}";
    		$curlData = "/ticket";
    		$curlAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
    		$curlCustom = "POST";  
    		$response = $this->myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP); 
		$json = json_decode($response, true);
		//print_r($json);	// debug
		$arr = array('serviceTicket' => $json['response']['serviceTicket'], 'idleTimeout' => $json['response']['idleTimeout'], 
								 'sessionTimeout' => $json['response']['sessionTimeout'], 'sessionVersion' => $json['version']);	// create array for JSON
		echo json_encode($arr);		// return JSON
	}
}
$a = new curlauth("Blak");  
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
 	$c->curlHTTP = json_decode(primeTicket_1(), true);
	$c->curlHTTP = $curlHTTP['serviceTicket'];
}

?>

