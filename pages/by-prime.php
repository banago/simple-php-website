<p>Cisco Prime Infrastructure provides complete lifecycle management of converged wired and wireless networks.</p>
<p><b>Whats New!</b></p>
<ul>
  <li>Search by HostName!</li>
  <li>Working Reset button</li>
  <li>Syle and bug fixes</li>
</ul>  	
<style>
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
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    -webkit-animation-name: fadeIn; /* Fade in the background */
    -webkit-animation-duration: 0.4s;
    animation-name: fadeIn;
    animation-duration: 0.4s
}
/* Modal Content */
.modal-content {
    position: fixed;
    bottom: 0;
    background-color: #fefefe;
    width: 100%;
    -webkit-animation-name: slideIn;
    -webkit-animation-duration: 0.4s;
    animation-name: slideIn;
    animation-duration: 0.4s
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
/* Add Animation */
@-webkit-keyframes slideIn {
    from {bottom: -300px; opacity: 0} 
    to {bottom: 0; opacity: 1}
}
@keyframes slideIn {
    from {bottom: -300px; opacity: 0}
    to {bottom: 0; opacity: 1}
}
@-webkit-keyframes fadeIn {
    from {opacity: 0} 
    to {opacity: 1}
}
@keyframes fadeIn {
    from {opacity: 0} 
    to {opacity: 1}
}
</style>
<head>
<script type="text/javascript">
function findformat(thediv, thefile, thekey) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById(thediv).innerHTML =  myObj.Type.fontcolor("green")  + " : " + myObj.Normalized;
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey+'='+document.search.data_text.value, true);
xmlhttp.send();
}
function encoded_1(thediv, thefile, thekey) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
	    if (myObj.Type == "MAC") {
		    myUrl = encodeURIComponent("https://agaprimepr01.fpicore.fpir.pvt/webacs/api/v1/data/Clients.json?.full=true\&macAddress=eq");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = ""; 	//clears the div
		    document.getElementById(thediv).innerHTML = myObj.Encoded;
		    primereturn_1(thediv, 'prime.php' , 'primeData', myObj.Encoded,'primeAddress', myUrl);
	    } else if (myObj.Type == "IP") {
		    myUrl = encodeURIComponent("https://agaprimepr01.fpicore.fpir.pvt/webacs/api/v1/data/Clients.json?.full=true\&ipAddress=eq");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = ""; 	//clears the div
		    primereturn_1(thediv, 'prime.php' , 'primeData', myObj.Encoded,'primeAddress', myUrl);
	    }  else if (myObj.Type == "HostName") {
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = ""; 	//clears the div
		    primereturn_2(thediv,'functions.php','hostName_1');
	    } else {
		    // catch all else error messages
		    var supported_1 = " MAC ";
		    var supported_2 = " IP ";
		    var supported_3 = " HostName ";
		    supported_1 = supported_1.bold().fontcolor("red");
		    supported_2 = supported_2.bold().fontcolor("red");
		    supported_3 = supported_2.bold().fontcolor("red");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = "Unfortunately this application only supports "+supported_1+"and"+supported_2+"addresses"+"or a"+supported_3 ;
	    }     
        }
    } 
xmlhttp.open('GET', thefile+'?'+thekey+'='+document.search.data_text.value, true);
xmlhttp.send();
}
function restmodal(thediv, thefile , thekey) {
    //var addSpinner = document.getElementById("spinner");  //var used to add spinner
    document.getElementById('spinner').style.display = "block";
    document.getElementById(thediv).innerHTML = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
    	//addSpinner.className +=" spinner";	//uses var to add spinner
	document.getElementById(thediv).innerHTML = "";
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
	    document.getElementById('spinner').style.display = "none";
            document.getElementById(thediv).innerHTML = myObj.response.serviceTicket;
	    document.getElementById(thediv).innerHTML = ""; 
	    apicreturn1('test1', 'restAuth.php' , 'use_ticket', myObj.response.serviceTicket);
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey+'=1', true);
xmlhttp.send();
}
function apicreturn1(thediv, thefile , thekey , theticket) {
    document.getElementById('spinner').style.display = "block";	
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		document.getElementById('spinner').style.display = "none";
		document.getElementById(thediv).innerHTML = xmlhttp.responseText;
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey+'='+theticket, true);
xmlhttp.send();
}
function primereturn_1(thediv, thefile , thekey_1 , theticket, thekey_2, theurl) {
    document.getElementById('spinner').style.display = "block";	
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		document.getElementById('spinner').style.display = "none";
		document.getElementById(thediv).innerHTML = xmlhttp.responseText;
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey_1+'='+theticket+'&'+thekey_2+'='+theurl, true);
xmlhttp.send();
}
function primereturn_2(thediv, thefile, thekey) {
  	document.getElementById('spinner').style.display = "block";
	document.getElementById(thediv).innerHTML = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		myObj = JSON.parse(this.responseText);
	    if (myObj.hasOwnProperty('IPv4')) {
		    document.getElementById('spinner').style.display = "none";
		    myUrl = encodeURIComponent("https://agaprimepr01.fpicore.fpir.pvt/webacs/api/v1/data/Clients.json?.full=true\&ipAddress=eq");
		    document.getElementById(thediv).innerHTML = xmlhttp.responseText;
		    primereturn_1(thediv, 'prime.php' , 'primeData', myObj.IPv4,'primeAddress', myUrl);
	    } else {
		    document.getElementById(thediv).innerHTML = myObj.Failure;
	    }
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey+'='+document.search.data_text.value, true);
xmlhttp.send();
}
</script>    
</head>
<body>

<h2>PRIME REST Request</h2>
<form id="search" name="search">
MAC | IP | HOSTNAME : <input type="text" name="data_text" id="uniqueID" onkeydown="if (event.keyCode == 13) {return false;}" onkeyup="if (event.keyCode == 13) {return false;}else{findformat('adiv','functions.php','data')};">
 <!-- Trigger/Open The Modal --> <!-- Add a type attribute button stops sumbit -->
<button id="myBtn" type="button">Open Modal</button>
<input id="myRst" type="reset" name="reset">
</form>
<!-- This DIV returns the users input after proccessing it through the php file -->
<div id="adiv"></div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2><center>PRIME GET Result</center></h2>
    </div>
    <div class="modal-body" align="center">
      <p>Result</p>
        <div id="spinner" align="center" class="spinner"></div>
	    <div style="text-align: center;">
		    <div id="adiv2" class="apicdata" style="display: inline-block; text-align: left">
			    Content<br /> style="font-size:20px">
		    </div>	    
	    </div>
	    <div id="test1" class="teest12"></div>
    <div class="modal-footer">
      <h3><center>END</center></h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When presses resets a div
var rst = document.getElementById("myRst");
// When the user clicks the button, open the modal
btn.onclick = function() {
    //document.getElementById("adiv2").innerHTML = restmodal('adiv2','restAuth.php','get_ticket');
    document.getElementById("adiv2").innerHTML = encoded_1('adiv2','functions.php','data');
    //document.getElementById("adiv2").innerHTML = document.getElementById("uniqueID").value;
    //document.getElementById("adiv2").innerHTML = input_1;
    modal.style.display = "block";
}
// When the user clicks the button, reset adiv
rst.onclick = function() {
	document.getElementById('adiv').innerHTML = "";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
