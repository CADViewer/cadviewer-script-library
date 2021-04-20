<?php

$fullPath = $_POST['file'];
$file_content = $_POST['file_content'];

$fullPath = urldecode($fullPath);

//echo "$fullPath";
//echo "$file_content";
//echo "";


if ($fd = fopen ($fullPath, "a")) {

//echo "file open!";

	fwrite($fd, $file_content);
	fclose ($fd);

 	echo "succes";
	exit;
}

 	echo "could not append file";
	exit;

?>