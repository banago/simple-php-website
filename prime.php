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
if (isset($_GET['primeData']) & isset($_GET['primeAddress']))
{
$data = $_GET['primeData'];
$addr = $_GET['primeAddress'];
echo "This mac was passed" . $name . "\r\n";
$data = "(" . $data . ")";
echo $addr . $data . "\r\n";
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,    //disables ssl server cert verify check
      CURLOPT_SSL_VERIFYHOST => false,    //disables ssk host cert verify check
      CURLOPT_URL => $primeAddress . $data,
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
} else {
        $json = json_decode($response, true);
        //print_r($json);
        //echo $response;
        //echo $json['vlanId']['associationTime'];
        $match = array("Interface :"=>'clientInterface',"Connection Type :"=>'connectionType',
                                   "NAS IP :"=>'deviceIpAddress',"NAS Name :"=>'deviceName',
                                   "Device Type :"=>'deviceType',"Device IP :"=>'ipAddress',
                                   "MAC Address :"=>'macAddress',"Security Policy :"=>'securityPolicyStatus',
                                   "OUI :"=>'vendor',"Device VLAN"=>'vlan');

    //$match = array('connectionType','deviceIpAddress','deviceName','deviceType','vendor','ipAddress','macAddress','securityPolicyStatus','userName');
    //echo $json['queryResponse']['entity']['0']['clientsDTO']['securityPolicyStatus'] . "\r\n";
    //echo print_r($json) . "\r\n";
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
