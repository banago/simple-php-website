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
    global $sitever;
    echo $sitever['17.0.0'];
}

function primeMac($mac)
{
    $name = $_GET['name'];
    echo "This would have been passed to prime " . $mac;
    echo "This is what was passed through GET" . $name;
    echo $sitever['17.0.0'];
}

if (isset($_GET['data'])) 
{
	$get_data = $_GET['data'];
	$deviceURL_1("$get_data");
	function deviceURL_1($data){
		$str = $data;
		$str = preg_replace('/\s+/', '', $str);     //Remove whitespaces
		$str_1 = (preg_match('/^([0-9A-Fa-f]{2}[:\-\.]){5}([0-9A-Fa-f]{2})$/', $str) == 1);
		$str_2 = (preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $str) == 1);
		if ($str_1 == 1) {
			echo "It's a mac!!!";
    		//make uppper
    		$str = strtoupper($str);
    		//list diliminators
    		$separator = array(':', '-','.');
    		//strip dilimintors
    		$str = str_replace($separator, '', $str);
   			//split by 2
    		$split_2 = str_split($str, 2);
    		//Debug;
    		//$count = count($split_2);
	    	//insert new diliinator
    		//$mac_dashes = implode('-', $split_2);         // A0-B0-C0-D0-E0-F0
	    	$mac_colons = implode(':', $split_2);           // A0:B0:C0:D0:E0:F0
	    	$add_quotes = "\"" .$mac_colons . "\"";         // "A0:B0:C0:D0:E0:F0"
	    	$url_encode = urlencode($add_quotes);           // %2208%3AE8%3A56%3A40%3AF4%3A48%22
	    	//echo $str;
	    	//echo $mac_colons;
	    	//echo $mac_dashes;	
	    	echo "This is a MAC Address: " . $url_encode . "<br>";
	    	return $url_encode;
	} elseif ($str_2 == 1) {
		echo "it's a ip!!!";
    	$add_quotes = "\"" .$str. "\"";                 // "192.168.1.1"
    	$url_encode = urlencode($add_quotes);           // %22192.168.1.1%22
    	echo "This is a IP Address: " . $url_encode . "<br>";
    	return $url_encode;
	} else { 
    	echo "it's probably a hostname!!!";
    	$add_quotes = "\"" .$str. "\"";                 // "macbook_123.user.net"
    	$url_encode = urlencode($add_quotes);           // %22macbook_123.user.net%22
    	echo "This is probably a hostname:  " . $url_encode . "<br>";
    	return $url_encode;
	}
}
}
?>
