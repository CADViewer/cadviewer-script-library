<?php

	require 'CADViewer_config.php';

	// we want to increase the execution time for time consuming conversions
	// 4 min is the maximum
	set_time_limit(240);

	$baseFile = $_POST['base_file'];
	$mergeFile = $_POST['merge_file'];
	$outFile = $_POST['out_file'];

	$executable = $dwgmergeLocation . '/' . $dwgmerge2020_executable;
	
	$cp_command_line = $executable . ' -base="' . $baseFile . '" -merge="' . $mergeFile . '" -out="' . $outFile . '" -over -lpath="' . $dwgmergeLocation .'"' ;
	
	echo '  command line merge: ' . $cp_command_line . '  ';
	
	exec($cp_command_line, $out, $return1);
	

//	if ($fd = fopen ($outFile, "w+")) {
//	//echo "file open!";
//		fwrite($fd, "dummy");
//		fclose ($fd);	
//	}
	
	echo $return1;
	
	exit;


?>
