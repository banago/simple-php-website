<?php
  function first($int, $string){ //function parameters, two variables.
    
$request = new HttpRequest();
$request->setUrl('https://devnetapi.cisco.com/sandbox/apic_em/api/v1/network-device');
$request->setMethod(HTTP_METH_GET);

$request->setHeaders(array(
  'postman-token' => '6a30ecb5-e42e-46e2-e88e-26ddf9c7f11d',
  'cache-control' => 'no-cache',
  'x-auth-token' => 'ST-1974-59fqSJ0BOl24oDtf0Nmx-cas',
  'content-type' => 'application/json'
));

$request->setBody('{"username":"devnetuser",
"password":"Cisco123!"
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

  }
?>
