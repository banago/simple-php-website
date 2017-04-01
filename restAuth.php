<?php
function apicRest_1($ticket){ //function parameters, one variable
	//Debug
	//echo "Ticket : " . $ticket;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://devnetapi.cisco.com/sandbox/apic_em/api/v1/network-device",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"x-auth-token: " . $ticket
			),
		));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		//Debug
		//echo $response;
		$json = json_decode($response, true);
		$match = array("Serial Number :"=>'serialNumber',"Family :"=>'family',"Type :"=>'type',
			       "Inventory :"=>'inventoryStatusDetail',"MAC :"=>'macAddress',
			       "Role :"=>'role',"MgmT :"=>'managementIpAddress',
			       "Platform :"=>'platformId',"Reachablity :"=>'reachabilityStatus',
			       "HostName :"=>'hostname');
		for ($i = 0; $i < count($json['response']); $i++) {
			//Debug
			//echo "How many response: " . count($json['response']) . "<br>";
			echo "<br>";
			echo "Item Count: " . $i . "<br>";
			echo "<br>";
			foreach ($match as $x => $item) {
				echo $x ."  " . $json['response'][$i][$item] . "<br>";
			}
		}
		//Debug
		//print_r($json);
	}  
}
?>

<?php
function primeRest_1($ticket){ //function parameters, one variable
	//Debug
	//echo "Ticket : " . $ticket;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://devnetapi.cisco.com/sandbox/apic_em/api/v1/network-device",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_POSTFIELDS => "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"x-auth-token: " . $ticket
			),
		));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		//Debug
		//echo $response;
		$json = json_decode($response, true);
		$match = array("Serial Number :"=>'serialNumber',"Family :"=>'family',"Type :"=>'type',
			       "Inventory :"=>'inventoryStatusDetail',"MAC :"=>'macAddress',
			       "Role :"=>'role',"MgmT :"=>'managementIpAddress',
			       "Platform :"=>'platformId',"Reachablity :"=>'reachabilityStatus',
			       "HostName :"=>'hostname');
		for ($i = 0; $i < count($json['response']); $i++) {
			//Debug
			//echo "How many response: " . count($json['response']) . "<br>";
			echo "<br>";
			echo "Item Count: " . $i . "<br>";
			echo "<br>";
			foreach ($match as $x => $item) {
				echo $x ."  " . $json['response'][$i][$item] . "<br>";
			}
		}
		//Debug
		//print_r($json);
	}  
}
?>

<?php
function apicTicket_1(){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://devnetapi.cisco.com/sandbox/apic_em/api/v1/ticket",
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => "",
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 30,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => "POST",
  		CURLOPT_POSTFIELDS => "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}",
  		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
    			"content-type: application/json",
		),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		//echo $response;
		$json = json_decode($response, true);
		//Debug
		//print_r($json);
		return $json['response']['serviceTicket'];
	}
}
?>

<?php
function primeTicket_1(){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://devnetapi.cisco.com/sandbox/apic_em/api/v1/ticket",
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => "",
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 30,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => "POST",
  		CURLOPT_POSTFIELDS => "{\"username\":\"devnetuser\",\n\"password\":\"Cisco123!\"\n}",
  		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
    			"content-type: application/json",
		),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		//echo $response;
		$json = json_decode($response, true);
		//Debug
		//print_r($json);
		return $json['response']['serviceTicket'];
	}
}
?>

<?php
function deviceURL_1(){
	$str = "192.1 68.1.1";
	$str = preg_replace('/\s+/', '', $str);     //Remove whitespaces
	$str_1 = (preg_match('/^([0-9A-Fa-f]{2}[:\-\.]){5}([0-9A-Fa-f]{2})$/', $str) == 1);
	$str_2 = (preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $str) == 1);
	if ($str_1 == 1) {
		echo "It's a mac!!!";
    	//make uppper
    	$str = strtoupper($str);
    	//list diliminators
    	$separator = array(':', '-','.');
    	//strip dilimintors
    	$str = str_replace($separator, '', $str);
   		//split by 2
    	$split_2 = str_split($str, 2);
    	//Debug;
    	//$count = count($split_2);
	    //insert new diliinator
    	//$mac_dashes = implode('-', $split_2);         // A0-B0-C0-D0-E0-F0
	    $mac_colons = implode(':', $split_2);           // A0:B0:C0:D0:E0:F0
	    $add_quotes = "\"" .$mac_colons . "\"";         // "A0:B0:C0:D0:E0:F0"
	    $url_encode = urlencode($add_quotes);           // %2208%3AE8%3A56%3A40%3AF4%3A48%22
	    //echo $str;
	    //echo $mac_colons;
	    //echo $mac_dashes;
	    echo $url_encode;
	    return $url_encode;
} elseif ($str_2 == 1) {
	echo "it's a ip!!!";
    $add_quotes = "\"" .$str. "\"";                 // "192.168.1.1"
    $url_encode = urlencode($add_quotes);           // %22192.168.1.1%22
    echo $url_encode;
    return $url_encode;
} else { 
    echo "it's probably a hostname!!!";
    $add_quotes = "\"" .$str. "\"";                 // "macbook_123.user.net"
    $url_encode = urlencode($add_quotes);           // %22macbook_123.user.net%22
    echo $url_encode;
    return $url_encode;
}
}
?>
