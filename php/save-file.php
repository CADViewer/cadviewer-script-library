<?php

$fullPath = $_POST['file'];
$file_content = $_POST['file_content'];

$base64 = 0;

try {
	$base64 = $_POST['base64'];
} catch (Exception $e) {
	// do nothing, base64 is just not defined
}

if ($base64==1){
	
	$file_content = base64_decode($file_content);	

}


$fullPath = urldecode($fullPath);


if (strpos ( $fullPath , 'http' )>-1){

	$fullPath = str_replace(" ", "%20", $fullPath);
}

echo "$fullPath";
//echo "$file_content";
echo "";

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