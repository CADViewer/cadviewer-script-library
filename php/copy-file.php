<?php

$localfilename = $_POST['localfilename'];
$fullPath = $_POST['localdestination'];

$fullPath = urldecode($fullPath);


$file_content = file_get_contents($localfilename);


//echo "$fullPath";
//echo "$file_content";
//echo "";

$basepath =    substr( $fullPath, 0, strrpos ( $fullPath , '/' ));

if (!file_exists($basepath)) {
	mkdir($basepath, 0777, true);
}

if (file_exists($fullPath)) {	
	unlink($fullPath);
//	rename($fullPath, $fullPath . '_old');
}


//$rand = rand ( 0 , 100000 );
//if ($fd = fopen ($fullPath . $rand, "w+")) {


if ($fd = fopen ($fullPath, "w+")) {
//echo "file open!";
	fwrite($fd, $file_content);
	fclose ($fd);	

//	copy ( string $source , string $dest
	
//	rename($fullPath ."x", $fullPath);
//	copy($fullPath . $rand, $fullPath);
		
	$time = time() + 1;
	touch($fullPath, $time);
	
//	if (touch($fullPath, $time)) {
//		echo $fullPath . ' modification time has been changed to present time';
//	} else {
//		echo 'Sorry, could not change modification time of ' . $fullPath;
//	}	
	
 	echo "Succes";
	exit;
}

 	echo "Could not save file " . $fullPath;
	exit;

?>