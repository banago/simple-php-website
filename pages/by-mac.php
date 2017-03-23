<?php
include 'restAuth.php';
include 'isefunctions.php';
?>


<?php	
$macAddress = '34:17:EB:A6:28:E5';
echo $iseAddress . $macAddress;
?>

<?php
if (isset($_POST['nameee'])) 
{ 
	$xc = $_POST['name'];
	//$mac = $_POST['name'];
	//iseMAC($macAddress);
}
?>

<form method="POST" action=''>
<input type="text" name="name">
<input type="submit" value="Submit">
</form>
	
        <div class="e-content"><div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item" data-updated-on="1472509483192" id="item-57c4b5b329687fa2d85a5c05"><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-ac12f63a8d769a824803"><div class="sqs-block-content"><p>NEWWWW Enter each address on a newline.</p></div></div><div class="sqs-block code-block sqs-block-code" data-block-type="23" id="block-yui_3_17_2_1_1472509339599_14596"><div class="sqs-block-content"><form id="form3" method="POST"> 
<input type="text" name="iseMac"><br>


</form>
<button onclick="macformat1()">Submit</button>
<script>
function macformat1(){
	var x,y,ya,z,za,xa,xb,xc,bc1,be1,name,a,b,answer,sp,sp1,sp2;
	x=document.getElementById("form3");
	y=x.elements["iseMac"].value;
	
	za=1;
  	zb="toUpperCase";
	xa = "%3A";
	xb = "%22";
	xc;
	//document.getElementById("calcid1").innerHTML="NewMac "+ za + "<br>";
	sp= [];
	//replaces new lines with a space and splits based on space

    		function reqListener () {
      			console.log(this.responseText);
    		}
    		var oReq = new XMLHttpRequest(); //New request object
    		oReq.onload = function() {
        	//This is where you handle what to do with the response.
        	//The actual data is found on this.responseText
        	alert(this.responseText); //Will alert: 42
    		};
    		oReq.open("get", "isefunctions.php?iseMAC="+y, true);
    		//                               ^ Don't block the rest of the execution.
   		//                                 Don't wait until the request finishes to 
    		//                                 continue.
    		oReq.send(); 
}
