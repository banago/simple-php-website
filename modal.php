<?php
class mymodal {
  function __construct($function) {
	  $this->modal_1(); 
  }
  function __get($name){
    return $this->$name;
  }	// used to get properties
  function __set($name,$value){
    return $this->$name = $value;
  }	// used to set properties
  function modal_1(){
  }
}
?>
