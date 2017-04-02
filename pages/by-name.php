<p>This 1is <b>By Name</b> page. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>


<style>
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
    width: 40%;
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
var test = ""; 
function findformat(thediv, thefile) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(thediv).innerHTML = xmlhttp.responseText;
            var test = xmlhttp.responseText;
        }
    }
xmlhttp.open('GET', thefile+'?data='+document.search.data_text.value, true);
xmlhttp.send();
}

function restmodal(thediv, thefile) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(thediv).innerHTML = xmlhttp.responseText; 
        }
    }
xmlhttp.open('GET', thefile+'?search_text='+document.search.data_text.value, true);
xmlhttp.send();
}
  
</script>    
</head>
<body>

<h2>APIC-EM REST Request with Animated Modal Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn" onclick="restmodal('adiv2','include.inc.php')">Open Modal</button>  <br>

<input type="submit" onclick="load('adiv','include.inc.php');"> <br>

<form id="search" name="search">
MAC | IP | HOSTNAME : <input type="text" name="data_text" onkeyup="findformat('adiv','functions.php');"> <br/>
<input type="reset" name="reset">

</form>
    
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
        <div id="adiv2" class="apic-output">
      
      <?php
      //echo $_GET['myData'];
      //include 'restAuth.php';
      
      //Debug  
      //$ticket = apicTicket_1();
      //Debug
      //echo apicTicket_1();
      //echo apicRest_1(apicTicket_1()); //returns Apic results;
      ?>
    </div>
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
