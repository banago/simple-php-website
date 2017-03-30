<?php
include 'restAuth.php';
include 'isefunctions.php';
?>
<p>This is the <b>By Mac</b> page. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>



<div class="entry-content">
      
        
          <div class="e-content"><div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item" data-updated-on="1472509483192" id="item-57c4b5b329687fa2d85a5c05"><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-ac12f63a8d769a824803"><div class="sqs-block-content"><p>Enter each address on a newline.</p></div></div><div class="sqs-block code-block sqs-block-code" data-block-type="23" id="block-yui_3_17_2_1_1472509339599_14596"><div class="sqs-block-content"><form id="form2"> 
<textarea name="textarea" style="width:250px;height:50px;">bA:dd:De:AD:be:ef&#13;&#10;dEDd.BEEF.caFe</textarea><br>

<div class="spinner"></div>
		  
<style>		  
.spinner {
    border: 4px solid #f3f3f3; /* Light grey */
    border-top: 4px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 15px;
    height: 15px;
    animation: spin 2s linear infinite;
}

.spinner.spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>		  

		  
</form>
<button onclick="macformat1()">Submit</button>

<script>
function macformat1(){
	var x,y,ya,z,za,xa,xb,xc,bc1,be1,name,a,b,answer,sp,sp1,sp2;
	var spinOne = document.getElementById('spinner');
	
	x=document.getElementById("form2");
	y=x.elements["textarea"].value;
	
	
	za=1;
  	zb="toUpperCase";
	xa = "%3A";
	xb = "%22";
	xc;
	//document.getElementById("calcid1").innerHTML="NewMac "+ za + "<br>";
	sp= [];
	//replaces new lines with a space and splits based on space
	var txtArray=y.replace(/\n/g, " ").split(" ");
	if (za == 1) {
		sp = ["2","4","6","8","10"];
		//Clears screen
		document.getElementById("macid1").innerHTML= "";
		//loops through array, replaces characters , prints to screen
		for(var i=0;i<txtArray.length;i++){
			if (zb == "toUpperCase"){
              txtArray[i] = txtArray[i].toUpperCase();
            }else if (zb == "toLowerCase"){
              txtArray[i] = txtArray[i].toLowerCase();
            }
			txtArray[i] = txtArray[i].replace(/[-:.,]/g, "")
			var len = txtArray[i].length;
			//loops though item in array adding a chracter every sp
			for(var i1=0;i1<sp.length;i1++){
				ya = txtArray[i].substring(0, len-sp[i1]) + xa + txtArray[i].substring(len-sp[i1]);
				txtArray[i] = ya;
			}
			xc = xb +ya + xb;
			document.getElementById("macid1").innerHTML+= xc + "<br>";
			
			
		}
		

    		function reqListener () {
      			console.log(this.responseText);
    		}
    		var oReq = new XMLHttpRequest(); //New request object
    		oReq.onload = function() {
        	//This is where you handle what to do with the response.
        	//The actual data is found on this.responseText
        	alert(this.responseText); //Will alert: 42
    		};
    		oReq.open("get", "isefunctions.php?iseMAC="+ya, true);
    		//                               ^ Don't block the rest of the execution.
   		//                                 Don't wait until the request finishes to 
    		//                                 continue.
		//window.location.href="prime.php?name=" + xc;
		oReq.send();
		document.getElementById("macid1").innerHTML+= xc + "<br>";
		spinner;
	}else {
		y = 0;
	}
}
</script>
<p id="macid1"></p>
</div></div></div></div></div></div>
<?php	
$macAddress = '34:17:EB:A6:28:E5';
echo $iseAddress . $macAddress;
?>

<?php
if (isset($_POST['name'])) 
{ 
	$xc = $_POST['name'];
	//$mac = $_POST['name'];
	//iseMAC($macAddress);
}
?>

