<?php
class curlauth {

  protected $attribute1;

  protected $attribute2;
  
  protected $curlAddress;
  
  protected $curlData;
  
  protected $curlCustom;
  
  protected $curlPost;
  
  protected $curlHTTP;

  function operation1 () {

  }

  function operation2 () {

  }

  function __construct($param) {

    echo "Constructor called with parameter ".$param."<br />"; 

  }
  function __get($name){
    return $this->$name;
  }
  function __set($name,$value){
    return $this->$name = $value;
  }
  function myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP) {
    //echo "curlAddress myCurl  ::" . $curlAddress . "<br>";	// debug
	//echo "curlData myCurl  ::" .  $curlData . "<br>";	// debug
	//echo "curlCustom myCurl  ::" .  $curlCustom . "<br>";	// debug
	//echo "curlPost myCurl  ::" .   $curlPost . "<br>";	// debug
	//echo "curlHTTP myCurl  ::" .   $curlHTTP . "<br>";	// debug
	//echo "FULLLcurlAddress myCurl  ::" .   $curlAddress . $curlData . "<br>"; // debug
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
	    //echo "RESPONSE   " .  $response;	// debug
	    return $response;    
    } 
  }
  function myPrime_1() {
    $response = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP);
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
}
$a = new curlauth("Blak");  
$b = new curlauth("kalB"); 
$a->attribute = 5;
echo $a->attribute;

?>         
