<?php
function apicRest_1(ticket){ //function parameters, two variables.
	echo "Ticket : " . $ticket;
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
			"postman-token: f36c170e-54a8-8412-eabe-5656b6229dfb",
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
    			"postman-token: 6431f474-6293-c546-f7d4-c97f09bf7ec9"
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
		print_r($json);
		return $json['response']['serviceTicket'];
	}
}
?>

