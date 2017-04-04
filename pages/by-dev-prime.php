<p>This is <b>by dev prime</b> page. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
	
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
    padding-top: 0; /* Location of the box */
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
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
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
            document.getElementById(thediv).innerHTML =  myObj.Type.fontcolor("green")  + " : " + myObj.Normalized + "<br>" + myObj.Encoded;
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
</script>    
</head>
<body>

<h2>APIC-EM REST Request with Animated Modal Header and Footer</h2>
<form id="search" name="search">
MAC | IP | HOSTNAME : <input type="text" name="data_text" onkeyup="findformat('adiv','functions.php','data');"> <br/>
 <!-- Trigger/Open The Modal --> <!-- Add a type attribute button stops sumbit -->
<button id="myBtn" type="button">Open Modal</button>
<input type="reset" name="reset">
</form>
<!-- This DIV returns the users input after proccessing it through the php file -->
<div id="adiv"></div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>GET Result</h2>
    </div>
    <div class="modal-body">
      <p>APIC-EM Return</p>
        <div id="spinner" class="spinner"></div>
	    <div id="adiv2" class="apicdata">
    		</div>
	    <div id="test1" class="teest12"></div>
    <div class="modal-footer">
      <h3>MODAL END</h3>
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
// When the user clicks the button, open the modal 
btn.onclick = function() {
    //document.getElementById("adiv2").innerHTML = restmodal('adiv2','restAuth.php','get_ticket');
    document.getElementById("adiv2").innerHTML = document.getElementById("search").value;
    //document.getElementById("adiv2").innerHTML = input_1;
    modal.style.display = "block";
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
