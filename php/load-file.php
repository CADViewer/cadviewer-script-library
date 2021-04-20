<?php

$http_origin = '';

if (isset($_SERVER['HTTP_ORIGIN'])) {
  $http_origin = $_SERVER['HTTP_ORIGIN'];
}
elseif (isset($_SERVER['HTTP_REFERER'])) {
  $http_origin = $_SERVER['HTTP_REFERER'];
}

$allowed_domains = array(
  'http://localhost:8080',
  'http://localhost',
);

if (in_array($http_origin, $allowed_domains))
{
    header("Access-Control-Allow-Origin: $http_origin");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
}



$fullPath = "";

if (!empty($_GET)) {
	$fullPath = $_GET['file'];
}
else{

    // no data passed by get
	$fullPath = $_POST['file'];
}

//echo $fullPath;

$contents = '';

$fp = "";

if ($fd = fopen ($fullPath, "rb")) {
    while(!feof($fd)) {
//        $buffer = fread($fd, 2048);
//        echo $buffer;
    	$contents .= fread($fd, 8192);
    }
	fclose ($fd);

}
else{
	echo "cannot open the file " . $fullPath;
}

echo $contents;

exit;

?>