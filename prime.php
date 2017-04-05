<?php
include 'restAuth.php';    // tickets tokons and secure data
if (isset($_GET['primeData']) & isset($_GET['primeAddress']))
{
$data = $_GET['primeData'];
$addr = $_GET['primeAddress'];
//echo "This mac was passed" . $name . "\r\n";  // debug
$data = "(" . $data . ")";
// echo $addr . $data . "\r\n"; //debug
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,    //disables ssl server cert verify check
      CURLOPT_SSL_VERIFYHOST => false,    //disables ssk host cert verify check
      CURLOPT_URL => $addr . $data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $primeAuth, //restAuth contains the auth Tokens. This also need to be update to return JSON instead of include
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} elseif ($array['http-code'] != 200) { 
  echo print_r($array);
} else {
        $json = json_decode($response, true);
        //print_r($json);  // debug
        //echo $response;  // debug
        //echo $json['vlanId']['associationTime']; // debug
        $match = array("NAS Interface :"=>'clientInterface',"NAS Connection Type :"=>'connectionType',
                                   "NAS IP :"=>'deviceIpAddress',"NAS Name :"=>'deviceName',
                                   "Device Type :"=>'deviceType',"Device IP :"=>'ipAddress',
                                   "MAC Address :"=>'macAddress',"Device Security Policy :"=>'securityPolicyStatus',
                                   "Device OUI :"=>'vendor',"Device VLAN:"=>'vlan');
    //echo $json['queryResponse']['entity']['0']['clientsDTO']['securityPolicyStatus'] . "\r\n";   // debug
    //echo print_r($json) . "\r\n";    // debug
        for ($i = 0; $i < count($json['queryResponse']['entity']); $i++) {
                //Debug
                //echo "How many response: " . count($json['response']) . "<br>";
                echo "<br>";
                echo "Array Element: " . $i . "<br>";
                echo "<br>";
                foreach ($match as $x => $item) {
                        echo $x ."  " . $json['queryResponse']['entity']['0']['clientsDTO'][$item] . "<br>";
                }
        }
}
}
?>
