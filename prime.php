<?php
include 'restAuth.php';
/* Do some operation here, like talk to the database, the file-session
 * The world beyond, limbo, the city of shimmers, and Canada.
 * 
 * AJAX generally uses strings, but you can output JSON, HTML and XML as well. 
 * It all depends on the Content-type header that you send with your AJAX
 * request. */

echo json_encode(42) . "\r\n"; //In the end, you need to echo the result. 
                      //All data should be json_encode()d.

                      //You can json_encode() any value in PHP, arrays, strings,
                      //even objects.
if (isset($_GET['primeMac'])) 
{
$name = $_GET['primeMac'];
echo "This mac was passed" . $name . "\r\n";


$macAddress = "(" . '%2218%3A66%3Ada%3A10%3A9d%3A94%22' . ")";
	//'(%2218%3A66%3Ada%3A10%3A9d%3A94%22)';
echo $iseAddress . $macAddress . "\r\n";
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_URL => $primeAddress . $macAddress,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $primeAuth,
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
