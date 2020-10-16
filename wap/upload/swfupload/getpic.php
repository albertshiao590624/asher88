<?php
header('Content-type: text/html; charset=UTF-8');

function getFileType($filename) {
	return substr($filename, strrpos($filename, '.') + 1);
}


$picurl = $_REQUEST['path'];
if($picurl!=''){



	$imghttp = get_headers ( $picurl, true );
	// 	var_dump($imghttp);
	$imgContent_type = array ('image/gif', 'image/jpeg', 'image/png' );
	if (preg_match ( '/200/', $imghttp [0] )) {
		if (in_array ( $imghttp ['Content-Type'], $imgContent_type )) {
			$filename      = date("Ymdhis").rand(100,999);
			$uploadfile    = "upload/" . $filename.".".getFileType($picurl);
			
			$data = file_get_contents ( $picurl );
			file_put_contents($uploadfile, $data);
			
			echo "succ|".$uploadfile;
			
		} else {
			echo "spider is error";
		}
	} else {
		echo "spider is error";
	}
}else{
	
	echo "url is null";
	
}