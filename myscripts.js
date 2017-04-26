var sqli_interface = {
  

  
  dbsearch_1 : function(thediv,thefile,thekey,thedocument) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else { 
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }  
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById(this.thediv).innerHTML =  myObj.Type.fontcolor("green")  + " : " + myObj.Normalized + "<br>" + myObj.Encoded;	// debug
	    if (myObj.Type == "HostName"){
		    var str = myObj.Normalized;
		    var res = str.replace(/"/g, "");	// strips exclimation ponts
		    document.getElementById(this.thediv).innerHTML = "HostName "+res;	// debug
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_5','sqlWhere',res);   
	    } else if (myObj.Type == "MAC"){
		    var str = myObj.Normalized;
		    var res = encodeURIComponent(str);
		    document.getElementById(this.thediv).innerHTML = "MAC "+res;	// debug
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_6','sqlWhere',res);
	    } else {
		    default_list('flex_div_1','mysqli.php','sqlQuery','query_3','sqlWhere',encodeURIComponent("1000-01-01 00:00:0"));
	    }
        }
    }
    xmlhttp.open('GET', this.thefile+'?'+this.thekey+'='+document.search_2.data_text.value, true);  // add this.thedocument inplace of the document
    xmlhttp.send();
  }
};
