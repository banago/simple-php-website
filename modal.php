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
	  <!DOCTYPE html>
<html>
<head>
	
		  .spinner {
		  border: 4px solid #f3f3f3; /* Light grey */
    	border-top: 4px solid #3498db; /* Blue */
    	border-radius: 50%;
    	width: 15px;
    	height: 15px;
    	animation: spin 2s linear infinite;
		}
		@keyframes spin {
		0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
	
		}
		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
    	position: fixed; /* Stay in place */
    	z-index: 1; /* Sit on top */
    	padding-top: 100px; /* Location of the box */
    	left: 0;
    	top: 0;
    	width: 100%; /* Full width */
    	height: 100%; /* Full height */
    	overflow: auto; /* Enable scroll if needed */
    	background-color: rgb(0,0,0); /* Fallback color */
    	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}
		/* Modal Content */
		.modal-content {
			position: relative;
    	background-color: #fefefe;
    	margin: auto;
    	padding: 0;
    	border: 1px solid #888;
    	width: 30%;
    	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    	-webkit-animation-name: animatetop;
    	-webkit-animation-duration: 0.4s;
    	animation-name: animatetop;
    	animation-duration: 0.4s
		}
		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {top:-300px; opacity:0} 
    	to {top:0; opacity:1}
		}
		@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
		}
		/* The Close Button */
		.close {
			color: white;
    	float: right;
    	font-size: 28px;
    	font-weight: bold;
		}
		.close:hover,
		.close:focus {
    	color: #000;
    	text-decoration: none;
    	cursor: pointer;
		}
		.modal-header {
    	padding: 2px 16px;
    	background-color: #5cb85c;
    	color: white;
		}
		.modal-body {padding: 2px 16px;}
		.modal-footer {
   		padding: -1px 16px;
    	background-color: #5cb85c;
    	color: white;
		}
</head>
	  </html>

	}
}
?>
