<?php
  function first($int, $string){ //function parameters, two variables.
    return $string;  //returns the second argument passed into the function
    $restAddress = "https://devnetapi.cisco.com/sandbox/apic_em/api/v1";
    $restCall = "/network-device";
    $restHeader ="ST-1974-59fqSJ0BOl24oDtf0Nmx-cas";
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
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $json = json_decode($response, true);
      print_r($json);
    }
  }
?>
