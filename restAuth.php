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
			echo "Array Element: " . $i . "<br>";
			echo "<br>";
			foreach ($match as $x => $item) {
				echo $x ."  " . $json['response'][$i][$item] . "<br>";
			}
		}
		//Debug
		//print_r($json);
	}  
}

if (isset($_GET['use_ticket'])) {
	echo $_GET['use_ticket'];
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
				echo "Array Element: " . $i . "<br>";
				echo "<br>";
				foreach ($match as $x => $item) {
					echo $x ."  " . $json['response'][$i][$item] . "<br>";
				}
			}
			//Debug
			//print_r($json);
		}  
	}
	primeRest_1($_GET['use_ticket']);
}

if (isset($_GET['get_ticket'])) {
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
			echo $response;
		}
	}
	apicTicket_1();
}
if (isset($_GET['iseTicket_1'])){
        function iseTicket_1(){
                $auth =""; 	// populate with a ticket
                $arr = array('Ticket' => $auth);
                echo json_encode($arr);
        }
}
if (isset($_GET['primeTicket_1'])){
        function iseTicket_1(){
                $auth =""; 	// populate with a ticket
                $arr = array('Ticket' => $auth);
                echo json_encode($arr);
        }
}
?>

