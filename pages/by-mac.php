<?php
include 'restAuth.php';
include 'prime.php';
?>
<p>This is the <b>By Mac</b> page. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>



<div class="entry-content">
      
        
          <div class="e-content"><div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item" data-updated-on="1472509483192" id="item-57c4b5b329687fa2d85a5c05"><div class="row sqs-row"><div class="col sqs-col-12 span-12"><div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-ac12f63a8d769a824803"><div class="sqs-block-content"><p>Here is a little tool I wrote to format Mac addresses. Enter each address on a newline.</p></div></div><div class="sqs-block code-block sqs-block-code" data-block-type="23" id="block-yui_3_17_2_1_1472509339599_14596"><div class="sqs-block-content">
		  <form id="form2" action="prime.php" method='get'> 
<textarea name="textarea" style="width:250px;height:150px;">bA:dd:De:AD:be:ef&#13;&#10;dEDd.BEEF.caFe</textarea><br>


</form>
<button onclick="macformat1()">Submit</button>
<script>

function macformat1(){
	var x,y,ya,z,za,xa,xb,xc,bc1,be1,name,a,b,answer,sp,sp1,sp2;
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
	
	}else {
		y = 0;
	}


}

</script>
<p id="macid1"></p>
</div></div></div></div></div></div>

<form action="prime.php" method='get'>
	<b>Enter your name: </b> <input type="text" name="name">
	<input type="submit">
	</form>
	
<form method="POST" action=''>
<input type="submit" name="button1"  value="My Button">
</form>

	
<script language="javascript" >
   id = "data"
</script>

<?php
   $getthevalueofid = xc;
   echo $getthevalueofid;
 ?>
	
<?php
$macAddress = '(%2218%3A66%3Ada%3A10%3A9d%3A94%22)';
echo $iseAddress . $macAddress . '<br/>';
	
if (isset($_POST['button1'])) 
{ 
   
   echo "button 1 has been pressed" . '<br/>'; 
   $getthevalueofid = id;
   echo $getthevalueofid;
   //iseAuth();
   $curl = curl_init();
   $somevar = $_GET["uid"];
   curl_setopt_array($curl, array(
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_URL => $primeAddress . $macAddress,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 300,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $primeAuth,
));
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $json = json_decode($response, true);
   echo $json['queryResponse']['entity'][0]['clientsDTO']['connectionType'] . '<br/>' ;
   echo $json['queryResponse']['entity'][0]['clientsDTO']['deviceIpAddress'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['deviceName'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['deviceType'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['hostname'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['ipAddress'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['macAddress'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['securityPolicyStatus'] . '<br/>';
   echo $json['queryResponse']['entity'][0]['clientsDTO']['userName'] . '<br/>';
  //print_r($json);
  //echo $response;
  //echo $json['vlanId']['associationTime'];
} 
}
?>

	
<script language="javascript" >
   id = "data"
</script>

<?php
   $getthevalueofid = id;
   echo $getthevalueofid;
 ?>
	
