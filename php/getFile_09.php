<?php

header("Access-Control-Allow-Origin: *");

require 'CADViewer_config.php';

$fileTag 	= $_GET['fileTag'];
$Type 		= $_GET['Type'];

$remainOnServer = 0;

try{
	$remainOnServer = $_GET['remainOnServer'];
} catch (Exception $e) {
		// none
}

$returnFile = $fileLocation . $fileTag . '.' . $Type;

$file_content = file_get_contents($returnFile);

echo $file_content;

if (file_exists($returnFile)){
	if ($remainOnServer==0)
		unlink($returnFile);
}

?>
