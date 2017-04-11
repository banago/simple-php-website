
<?php
class Rest {
  
  protected $auth;
  protected $url;
  protected $data;
 
  
  function getFormat(){
  }
  function getApicTicket(){
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
			return $response;
		}
	}
  }
  function __construct(){
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
        "x-auth-token: " . getApicTicket()
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $json = json_decode($response, true);
      $match = array("Serial Number :"=>'serialNumber',"Family :"=>'family',"Type :"=>'type',
                     "Inventory :"=>'inventoryStatusDetail',"MAC :"=>'macAddress',
                     "Role :"=>'role',"MgmT :"=>'managementIpAddress',
                     "Platform :"=>'platformId',"Reachablity :"=>'reachabilityStatus',
                     "HostName :"=>'hostname');
      for ($i = 0; $i < count($json['response']); $i++) {
        echo "<br>";
        echo "Array Element: " . $i . "<br>";
        echo "<br>";
        foreach ($match as $x => $item) {
          echo $x ."  " . $json['response'][$i][$item] . "<br>";
        }
      }    
    }    
  }
  function __get($name){
	  echo "Asked for " . $name . "<br/>";
	  return $this->$name;
  }
  function __set($name,$value) {
    switch($name) {
      case "atuh": 
        $this->auth = $value;
        break;
      case "url": 
        $this->url = $value;
        break;  
      case "data": 
        $this->data = $value;
        break;
      default : 
        echo $name . " Not Found";
    }
    echo "SET " . $name . " to " . $value . "<br/>";
  }
  
}

class Apic extends Rest {
}
?>
