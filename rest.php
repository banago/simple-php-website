
<?php
class Rest {
  
  protected $auth;
  protected $url;
  protected $data;
  
  function getFormat(){
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
        
    
  }
  function __get(){
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
