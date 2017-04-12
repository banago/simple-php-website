<?php
include 'restAuth.php';    // tickets tokons and secure data
function myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP) {
    	$curl = curl_init();    
	//echo $curlAddress . $curlData . "\r\n"; // debug
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
        	CURLOPT_HTTPHEADER => $curlHTTP, // restAuth contains the auth Tokens. This also need to be update to return JSON instead of include
    	));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
	    return $response;    
    } 
}

if (isset($_GET['$curlAddress']) & isset($_GET['$curlData'])
	& isset($_GET['$curlCustom']) & isset($_GET['$curlPost'])
	& isset($_GET['$curlHTTP'])) {
	$curlAddress = $_GET['$curlAddress'];
	$curlData = $_GET['$curlData'];
    	$curlHTTP = array($_GET['$curlCustom']);
	$curlCustom = $_GET['$curlPost'];
    	$curlPost = $_GET['$curlHTTP']; 
    	$reponse = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP);
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
                		//Debug
                		//echo "How many response: " . count($json['response']) . "<br>";
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
            		echo "<p>" . "</p>" . "<p>" . "</p>"; ; 
        	}
	}   
}
//  Deconstruct to create a new ticket getting function......
if (isset($_GET['$apicTicket_1'])) {
	function apicTicket_1(){
		$curlHTTP = array(
        		"cache-control: no-cache",	
        		"content-type: application/json");
    	$curlPost = "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}";
    	$curlData = "/ticket";
    	$curlAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
    	$curlCustom = "POST";  
    	$response = myCurl($curlAddress, $curlData, $curlCustom, $curlPost, $curlHTTP); 
    	$json = json_decode($response, true);
	//print_r($json);	// debug
	$arr = array('serviceTicket' => $json['response']['serviceTicket'], 'idleTimeout' => $json['response']['idleTimeout'], 
		     'sessionTimeout' => $json['response']['sessionTimeout'], 'sessionVersion' => $json['version']);	// create array for JSON
	echo json_encode($arr);		// return JSON
	}
	apicTicket_1();
}

?>

