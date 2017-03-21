
<p>This is the <b>By Mac</b> page. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>



<form method="POST" action=''>
<input type="submit" name="button1"  value="My Button">
</form>
<?php
include 'restAuth.php';
$macAddress = '(%2290%3Ab1%3A1c%3A87%3A60%3A38%22)';
echo $iseAddress . $macAddress . '<br/>';
if (isset($_POST['button1'])) 
{ 
   echo "button 1 has been pressed" . '<br/>'; 
   //iseAuth();
   $curl = curl_init();

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
   echo $json['vlanId']['associationTime'];
  //print_r($json);
  //echo $response;
  //echo $json['vlanId']['associationTime'];
} 
}
?>
