<?php
  function first($int, $string){ //function parameters, two variables.


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
    "x-auth-token: ST-1989-tESpJnucQ7xwwVdB3f9w-cas"
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
	for ($i = 0; $i < count($json); $i++) {
		echo "How many: " . count($json);
   	 	echo $array[$i]['filepath'];
	}
  	print_r($json);
}  
}

?>


