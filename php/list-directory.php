<?php


    // Define the full path to your folder from root

$path = $_POST['directory'];
$path_url = $_POST['directoryurl'];


    // Open the folder

    $dir_handle = @opendir($path) or die("Unable to open $path");


    // Loop through the files

    while ($file = readdir($dir_handle)) {


    if($file == "." || $file == ".." || $file == "list-directory.php" || $file == "delete-file.php" || $file == "load-header.php" || $file == "filenames.rw" || $file == "load-file.php" || $file == "save-file-p1.php" )
        continue;


	$pos = strpos($file, ".");
	if ($pos == false)
		continue;     // no file extension, therefore a subdirectory

		$fname = $path_url . $file;

#        echo "<a href=\"$fname\">$file</a><br />";

        echo "<br>$file";
#        echo "$file<br/>";



    }



    // Close

    closedir($dir_handle);



?>