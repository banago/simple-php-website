<?php

/**
 * Used to store different static data.
 *
 * @var array
 */
$config = [
    'name' => 'Frosty Face',
];

/**
 * Displays site name. Uses $config global.
 */
function siteName()
{
    global $config;
    echo $config['name'];
}

/**
 * Displays page title. It takes the data from 
 * URL, it replaces the hyphens with spaces and 
 * it capitalizes the words.
 */
function pageTitle()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

    echo ucwords(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from 
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function pageContent()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    $path = getcwd().'/pages/'.$page.'.php';

    if (file_exists($path)) {
        include $path;
    } else {
        include 'pages/404.php';
    }
}
function siteVersion()
{
     $sitever = " Version: 17.0.3";
    echo $sitever;
}

function primeMac($mac)
{
    $name = $_GET['name'];
    echo "This would have been passed to prime " . $mac;
    echo "This is what was passed through GET" . $name;
    echo $sitever['17.0.1'];
}

if (isset($_GET['data'])) 
{
	//$get_data = $_GET['data'];
	
	function deviceURL_1($data){
		$str = $data;
		$str = preg_replace('/\s+/', '', $str);     //Remove whitespaces
		$str_1 = (preg_match('/^([0-9A-Fa-f]{2}[:\-\.]){5}([0-9A-Fa-f]{2})$/', $str) == 1) | (preg_match('/^([0-9A-Fa-f]{4}[:\-\.]){2}([0-9A-Fa-f]{4})$/', $str) == 1);	// matches EUI-64 MAC format and other format conventions
		$str_2 = (preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $str) == 1);	// matches IPv4 addresses
		if ($str_1 == 1) {
			//echo "It's a mac!!!" . "<br>"; 		// Debug
    			$str = strtoupper($str); 			// Make uppper
    			$separator = array(':', '-','.'); 		// Array of diliminators
    			$str = str_replace($separator, '', $str); 	// Strip dilimintors
    			$split_2 = str_split($str, 2);			// Split by 2
    			//$count = count($split_2); 			// Debug
    			$mac_dashes = implode('-', $split_2);        	// A0-B0-C0-D0-E0-F0
	    		$mac_colons = implode(':', $split_2);           // A0:B0:C0:D0:E0:F0
	    		$add_quotes = "\"" . $mac_colons . "\"";        // "A0:B0:C0:D0:E0:F0"
	    		$url_encode = urlencode($add_quotes);           // %2208%3AE8%3A56%3A40%3AF4%3A48%22
	    		$arr = array('Input' => $data,'Type' => 'MAC','Colons' => $mac_colons, 'Normalized' => $add_quotes, 'Encoded' => $url_encode);	//creates an array for the JSON encoder
			//echo $str; 					// Debug
	    		//echo $mac_colons; 				// Debug
	    		//echo $mac_dashes;				// Debug
	    		//echo "This is a MAC Address: " . $mac_colons . "<br>";
			echo json_encode($arr);		// returns JSON
		} elseif ($str_2 == 1) {
			//echo "it's a ip!!!" . "<br>"; 		// Debug
    			$add_quotes = "\"" . $str . "\"";               // "192.168.1.1"
    			$url_encode = urlencode($add_quotes);           // %22192.168.1.1%22
			$arr = array('Input' => $data,'Type' => 'IP','Normalized' => $add_quotes,'Encoded' => $url_encode);	//creates an array for the JSON encoder
			echo json_encode($arr);
		} else { 
    			//echo "it's probably a hostname!!!" . "<br>";	// Debug
		    	$add_quotes = "\"" . $str . "\"";               // "macbook_123.user.net"
		    	$url_encode = urlencode($add_quotes);           // %22macbook_123.user.net%22
			$arr = array('Input' => $data,'Type' => 'HostName','Normalized' => $add_quotes,'Encoded' => $url_encode);	//creates an array for the JSON encoder
			echo json_encode($arr);		// returns JSON
		}
	}
	deviceURL_1($_GET['data']);
}
if (isset($_GET['data_2'])) 
{
	//$get_data = $_GET['data'];
	
	function deviceURL_1($data){
		$str = $data;
		$str = preg_replace('/\s+/', '', $str);     //Remove whitespaces
		$str_1 = (preg_match('/^([0-9A-Fa-f]{2}[:\-\.]){5}([0-9A-Fa-f]{2})$/', $str) == 1) | (preg_match('/^([0-9A-Fa-f]{4}[:\-\.]){2}([0-9A-Fa-f]{4})$/', $str) == 1);	// matches EUI-64 MAC format and other format conventions
		$str_2 = (preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $str) == 1);	// matches IPv4 addresses
		if ($str_1 == 1) {
			//echo "It's a mac!!!" . "<br>"; 		// Debug
    			$str = strtoupper($str); 			// Make uppper
    			$separator = array(':', '-','.'); 		// Array of diliminators
    			$str = str_replace($separator, '', $str); 	// Strip dilimintors
    			$split_2 = str_split($str, 2);			// Split by 2
    			//$count = count($split_2); 			// Debug
    			$mac_dashes = implode('-', $split_2);        	// A0-B0-C0-D0-E0-F0
	    		$mac_colons = implode(':', $split_2);           // A0:B0:C0:D0:E0:F0
	    		$make_normal = $mac_colons;        // "A0:B0:C0:D0:E0:F0"
	    		$url_encode = urlencode($make_normal);           // %2208%3AE8%3A56%3A40%3AF4%3A48%22
	    		$arr = array('Input' => $data,'Type' => 'MAC','Colons' => $mac_colons, 'Normalized' => $make_normal, 'Encoded' => $url_encode);	//creates an array for the JSON encoder
			//echo $str; 					// Debug
	    		//echo $mac_colons; 				// Debug
	    		//echo $mac_dashes;				// Debug
	    		//echo "This is a MAC Address: " . $mac_colons . "<br>";
			echo json_encode($arr);		// returns JSON
		} elseif ($str_2 == 1) {
			//echo "it's a ip!!!" . "<br>"; 		// Debug
    			$add_quotes = "\"" . $str . "\"";               // "192.168.1.1"
    			$url_encode = urlencode($add_quotes);           // %22192.168.1.1%22
			$arr = array('Input' => $data,'Type' => 'IP','Normalized' => $add_quotes,'Encoded' => $url_encode);	//creates an array for the JSON encoder
			echo json_encode($arr);
		} else { 
    			//echo "it's probably a hostname!!!" . "<br>";	// Debug
		    	$add_quotes = "\"" . $str . "\"";               // "macbook_123.user.net"
		    	$url_encode = urlencode($add_quotes);           // %22macbook_123.user.net%22
			$arr = array('Input' => $data,'Type' => 'HostName','Normalized' => $add_quotes,'Encoded' => $url_encode);	//creates an array for the JSON encoder
			echo json_encode($arr);		// returns JSON
		}
	}
	deviceURL_1($_GET['data_2']);
}
if (isset($_GET['hostName_1'])){
        function resolveHost_1($host){
		$fpi = ".fpi.fpir.pvt";		// DNS suffix
		$nwfcs = ".nfcs.fpir.pvt";	// DNS suffix
		$fce = ".farmcrediteast.fpir.pvt";		// DNS suffix
		$agc = ".agcountry.fpir.pvt";	// DNS suffix
		$failure = $host . $fpi;	// if submitted name is returned assume failure
		$message = "Unable to resolve: ";
		if ($ip = gethostbyname($host . $fpi) != $host . $fpi) {
			$ip = gethostbyname($host . $fpi);	// gets the IPv4 address of the host
			$arr = array('IPv4' => $ip);	 // create array for JSON
			exec("/bin/ping -c 2 " . $ip, $output, $result);
			//print_r($output);
			//print_r($result);
			preg_match( '/\)(.*?)\)/', $output[0], $match );
			echo "TJHIS    " . $output[0];
			print_r($match);
			echo "DFSDFD    " . $match[1];
			echo json_encode($arr);		// return JSON
		} elseif ($ip = gethostbyname($host . $nwfcs) != $host . $nwfcs) {
			$ip = gethostbyname($host . $nwfcs);	// gets the IPv4 address of the host
			$arr = array('IPv4' => $ip);	 // create array for JSON
			echo json_encode($arr);		// return JSON
		} elseif ($ip = gethostbyname($host . $fce) != $host . $fce) {
			$ip = gethostbyname($host . $fce);	// gets the IPv4 address of the host
			$arr = array('IPv4' => $ip);	 // create array for JSON
			echo json_encode($arr);		// return JSON
		} elseif ($ip = gethostbyname($host . $agc) != $host . $agc) {
			$ip = gethostbyname($host . $agc);	// gets the IPv4 address of the host
			$arr = array('IPv4' => $ip);	 // create array for JSON
			echo json_encode($arr);		// return JSON
		} else {
			$failure = $message . $host;
			$ip = gethostbyname($host . $nwfcs);	// gets the IPv4 address of the host
			$arr = array('Failure' => $failure);	 // create array for JSON
			echo json_encode($arr);		// return JSON
		}
        }
	resolveHost_1($_GET['hostName_1']);
}


?>
