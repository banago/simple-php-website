<?php if ($_SESSION['timeout_idle'] < time()) : session_destroy(); ?>
    Session Timeout <br />
<?php endif; ?>

<?php if (!isset($_SESSION['valid_user'])) : ?>
    This is a secured page please login to continue <br />
    <p><a href="?page=by-dev-authmain">ISE Bypass Login Page</a></p>
<?php endif; ?>

<?php if (isset($_SESSION['valid_user'])) : ?>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<p>Cisco Identity Services Engine (ISE) is a next-generation identity and access control policy platform that enables enterprises to enforce compliance, enhance infrastructure security, and streamline their service operations. The unique architecture of Cisco ISE allows enterprises to gather real-time contextual information from networks, users, and devices.</p>		
<div class="flex-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="flex-dialog"> 
	    <div class="flex-content">
		<div class="flex-header">
		    <h2><center>BYPASS LIST</center></h2>
			<div id="search_2" align="left">
	<form id="search_2" name="search_2">
	<input type="text" name="data_text" id="uniqueID" placeholder="Search.." onkeydown="if (event.keyCode == 13) {return false;}" onkeyup="if (event.keyCode == 13) {return false;}else{new dbsearch_1('flex_div_1','functions.php','data_2', 'document.search_2.data_text.value')};"> 
	<!-- Trigger/Open The Modal --> <!-- Add a type attribute button stops sumbit -->
				</form>
			</div>
		</div>             
		<div class="flex-body" id="flex_div_1">	
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>	
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>				
		    <div class="flex-item">{01:23:45:67:89:ab} Demo-User-Name Demo-User-Status</div>			
		</div> 
		<div class="flex-footer"><mark_blue>Blue</mark_blue> = <strong>New</strong> 
		    <mark_grey>grey</mark_grey> = <strong>Active</strong> 
		    <mark_red>Red</mark_red> = <strong>Problem</strong> 
		</div>        
	    </div>    
	</div> 
</div> 
<p><b>Whats New!</b></p>
<ul>
  <li>Color Coding and visual effects</li>
  <li>Select a row to view notes!!</li>
  <li>New Authenication Page for Bypasses!!!!</li>
  <li>PHP backend refactored Now Object oriented</li>
</ul>  	
<head>

<script src="myscripts.js">
</script>	
	
<script type="text/javascript">
/*function dbsearch_1(thediv, thefile, thekey) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById(thediv).innerHTML =  myObj.Type.fontcolor("green")  + " : " + myObj.Normalized + "<br>" + myObj.Encoded;	// debug
	    if (myObj.Type == "HostName"){
		    var str = myObj.Normalized;
		    var res = str.replace(/"/g, "");	// strips exclimation ponts
		    document.getElementById(thediv).innerHTML = "HostName "+res;	// debug
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_5','sqlWhere',res);   
	    } else if (myObj.Type == "MAC"){
		    var str = myObj.Normalized;
		    var res = encodeURIComponent(str);
		    document.getElementById(thediv).innerHTML = "MAC "+res;	// debug
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_6','sqlWhere',res);
	    } else {
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_3','sqlWhere',encodeURIComponent("1000-01-01 00:00:0"));
	    }
        }
    }
xmlhttp.open('GET', thefile+'?'+thekey+'='+document.search_2.data_text.value, true);
xmlhttp.send();
}*/
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
		    myUrl = encodeURIComponent("https://agaisepr01.fpicore.fpir.pvt/admin/API/mnt/Session/MACAddress/");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = myObj.Encoded;
		    curlreturn_1(thediv, 'curlrest.php' , 'Type' , 'iseTicket_1' , 'curlAddress', myUrl , 'curlData' , myObj.Encoded , 'curlCustom' , 'GET' , 'curlPost' , '');
		    
	    } else if (myObj.Type == "IP") {
		    var supported_1 = " MAC ";
		    var supported_2 = " IP ";
		    supported_1 = supported_1.bold().fontcolor("red");
		    supported_2 = supported_2.bold().fontcolor("red");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = "Unfortunately this application only supports "+supported_1+"and"+supported_2+"addresses" ;
	    }
		else {
		    var supported_1 = " MAC ";
		    var supported_2 = " IP ";
		    supported_1 = supported_1.bold().fontcolor("red");
		    supported_2 = supported_2.bold().fontcolor("red");
		    document.getElementById('spinner').style.display = "none";
		    document.getElementById(thediv).innerHTML = "Unfortunately this application only supports "+supported_1+"and"+supported_2+"addresses" ;
	    }     
        }
    } 
xmlhttp.open('GET', thefile+'?'+thekey+'='+document.search.data_text.value, true);
xmlhttp.send();
}
function default_list(thediv, thefile, thekeyA_1, thekeyB_1, thekeyA_2, thekeyB_2) {    
	if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();	    
	} else { 
	    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	} xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myObj = JSON.parse(this.responseText);
		    	//document.getElementById(thediv).innerHTML = myObj.length;	// debug
		    	//document.getElementById(thediv).innerHTML = myObj[0].Mac_ID;	// debug
		    	if (myObj[0].hasOwnProperty("Mac_ID")) {
				var myNode = document.getElementById(thediv);
			    	while (myNode.firstChild) {
					myNode.removeChild(myNode.firstChild);
				}
				for (i1 = 0; i1 < myObj.length; i1++) {
					var newdiv = document.createElement('div');
				    	newdiv.className = 'flex-item';
					newdiv.style.background = "linear-gradient(-90deg, white, LightGrey)"; /* Standard syntax */
					newdiv.style.color = "black";
					if (myObj[i1].State == "PASSIVE" || myObj[i1].Action > 5) {
						newdiv.style.background = "linear-gradient(-90deg, FireBrick, LightGrey)";
						newdiv.style.color = "white";    
					}
					newdiv.onclick = function () {
						modal.style.display = "block";
						var str = this.textContent.split(" ", 1);
						str = encodeURIComponent(str);
						document.getElementById("adiv2").innerHTML = str;
						get_notes('adiv2','mysqli.php','sqlQuery','query_4','sqlWhere',str);
					}
				    	newdiv.innerHTML = myObj[i1].Mac_ID+' '+myObj[i1].Fname+' '+myObj[i1].Lname+' '+myObj[i1].Valid_From+' '+myObj[i1].State;
				    	document.getElementById(thediv).appendChild(newdiv);  
				}   
			}
		}
	}       
	xmlhttp.open('GET', thefile+'?'+thekeyA_1+'='+thekeyB_1+'&'+thekeyA_2+'='+thekeyB_2, true);
	xmlhttp.send();
}
	
function get_notes(thediv, thefile, thekeyA_1, thekeyB_1, thekeyA_2, thekeyB_2) {    
	if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();	    
	} else { 
	    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	} xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myObj = JSON.parse(this.responseText);
		    	if (myObj[0].hasOwnProperty("Mac_ID")) {
				document.getElementById('spinner').style.display = "none";
				//document.getElementById("testdiv").innerHTML = JSON.parse(ouiLookup);
				//myObj_1 = JSON.parse(ouiLookup);
				var url = "https://financialpartners.service-now.com/nav_to.do?uri=task.do?sysparm_query=number=";
				var window = " target=\"_blank\"";
				var ticket = "<a href="+url+myObj[0].Ticket+window+">"+myObj[0].Ticket+"</a>";
				var mac_encoded = encodeURIComponent(myObj[0].Mac_ID);
				if (myObj[0].Action > 5) {
					document.getElementById("adiv2").innerHTML = "MAC : "+myObj[0].Mac_ID+" "+'<br />'+ticket+'<br />'+
						'<p>'+'<font color="red">'+myObj[0].Action+'</font>'+'</p>'+"BYPASS count : ";
				} else {
					document.getElementById("adiv2").innerHTML = "MAC : "+myObj[0].Mac_ID+" "+'<br />'+ticket+'<br />'+
						'<p>'+myObj[0].Action+'</p>'+"BYPASS count : ";
				}
				document.getElementById("modal-body").innerHTML = "";	// clears a DIV
				curlreturn_1("modal-body", "curlrest.php"  , "Type" , "ouiLookup_1" , "curlAddress" , "http%3A%2F%2Fapi.macvendors.com%2F", "curlData", mac_encoded, "curlCustom" , "GET" , "curlPost" , "%22%22");
				
				
				
			}
		}
	}       
	xmlhttp.open('GET', thefile+'?'+thekeyA_1+'='+thekeyB_1+'&'+thekeyA_2+'='+thekeyB_2, true);
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
function curlreturn_1(thediv, thefile  , thetype , thetypeval , thekey_1 , theval_1, thekey_2, theval_2, thekey_3 , theval_3 , thekey_4 , theval_4) {
    document.getElementById('spinner').style.display = "block";	
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		document.getElementById('spinner').style.display = "none";
		if (thediv == "modal-body") {
				document.getElementById(thediv).innerHTML = '<p>'+"OUI : "+xmlhttp.responseText+'</p>';
		} else {
			document.getElementById(thediv).innerHTML = xmlhttp.responseText;
		}
        }
    }
    xmlhttp.open('GET', thefile+'?'+thetype+'='+thetypeval+'&'+thekey_1+'='+theval_1+'&'+thekey_2+'='+theval_2+'&'+thekey_3+'='+theval_3+'&'+thekey_4+'='+theval_4, true);
    	xmlhttp.send();	
}

	</script>    
</head>
<body>
	<h2>ISE REST Request</h2>
	<!-- This DIV returns the users input after proccessing it through the php file -->
	<div id="adiv"></div>
	<div id="testdiv"></div>
	<!-- The Modal -->
	<div id="myModal" class="modal">  
	<!-- Modal content -->  
	<div class="modal-content">    
	  <div class="modal-header">      
	    <span class="close">&times;</span>      
	    <h2><center>RESULT</center></h2>   
	  </div>    
	  <div class="modal-body" align="center">      
		  <p>Details</p> 
		  <div id="modal-body"></div>        
	    <div id="spinner" align="center" class="spinner"></div>
	    <div style="text-align: center;">
		    <div id="adiv2" class="apicdata" style="display: inline-block; text-align: left">
			    Content<br /> style="font-size:20px">
		    </div>	    
	    </div>
	    <div id="test1" class="teest12"></div>    
	    <div class="modal-footer">      
	    <h3><center>___\__-_-__/___</center></h3>    
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
//var formvalue_1 = document.getElementById("uniqueID").value;
// populates flex_div_1 on page load	
default_list('flex_div_1','mysqli.php','sqlQuery','query_3','sqlWhere',encodeURIComponent("1000-01-01 00:00:0"));	
/* not needed as their are no buttons and it stops the exection of the rest of the code.
btn.onclick = function() {
    //document.getElementById("adiv2").innerHTML = b('flex_div_1','mysqli.php','sqlQuery','query_3','sqlWhere',cats);
    //document.getElementById("adiv2").innerHTML = restmodal('adiv2','restAuth.php','get_ticket');
    document.getElementById("adiv2").innerHTML = encoded_1('adiv2','functions.php','data_2');
    //document.getElementById("adiv2").innerHTML = document.getElementById("uniqueID").value;
    //document.getElementById("adiv2").innerHTML = input_1;
    modal.style.display = "block";
}
// When the user clicks the button, reset adiv
rst.onclick = function() {
	document.getElementById('adiv').innerHTML = "";
}*/
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
document.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php endif; ?>
