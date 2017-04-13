<?php
class curlauth {

  private $attribute1;

  private $attribute2;

  function operation1 () {

  }

  function operation2 () {

  }

  function __construct($param) {

    echo "Constructor called with parameter ".$param."<br />"; 

  }
  function __get($name){
    return $this->$name;
  }
  function __set($name,$value){
    return $this->$name = $value;
  }
}
$a = new curlauth("Blak");  
$b = new curlauth("kalB"); 
$a->attribute = 5;
echo $a->attribute;

?>         
