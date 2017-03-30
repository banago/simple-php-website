if (isset($_GET['restMac'])) 
{
$name = $_GET['restMac'];
echo "This mac was passed" . $name . "\r\n";
$restAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
$restCall = "/network-device";
$restHeader ="ST-1974-59fqSJ0BOl24oDtf0Nmx-cas";
$macAddress = "(" . '%2220%3A47%3A47%3AC3%3A0F%3A8B%22' . ")";

	//'(%2220%3A47%3A47%3AC3%3A0F%3A8B%22)';
echo $iseAddress . $macAddress . "\r\n";
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_URL => $restAddress . $restCall,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: c94ec74d-61d0-0351-d58a-e3785abb63fd",
    "x-auth-token: ST-1974-59fqSJ0BOl24oDtf0Nmx-cas"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $json = json_decode($response, true);
  //print_r($json);
  //echo $response;
  //echo $json['vlanId']['associationTime'];
	$match = array('connectionType','deviceIpAddress','deviceName','deviceType','vendor','ipAddress','macAddress','securityPolicyStatus','userName');
	echo $json['queryResponse']['entity']['0']['clientsDTO']['securityPolicyStatus'] . "\r\n";
  	echo print_r($json) . "\r\n";
 	for ($i1 = 0; $i1 < count($json['queryResponse']['entity']['0']); $i1++) {
    		foreach ($match as $item) {
			echo $json['queryResponse']['entity'][$i1]['clientsDTO'][$item] . "\r\n";
		}
	}
}
}
?>

<?php
  function first(){ //function parameters, two variables.
    return $string;  //returns the second argument passed into the function
    $name = $_GET['restMac'];
echo "This mac was passed" . $name . "\r\n";
$restAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
$restCall = "/network-device";
$restHeader ="ST-1974-59fqSJ0BOl24oDtf0Nmx-cas";
$macAddress = "(" . '%2220%3A47%3A47%3AC3%3A0F%3A8B%22' . ")";

	//'(%2220%3A47%3A47%3AC3%3A0F%3A8B%22)';
echo $iseAddress . $macAddress . "\r\n";
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_URL => $restAddress . $restCall,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: c94ec74d-61d0-0351-d58a-e3785abb63fd",
    "x-auth-token: ST-1974-59fqSJ0BOl24oDtf0Nmx-cas"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $json = json_decode($response, true);
  //print_r($json);
  }
?>		
		
		
