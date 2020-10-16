<?php

$allow_upload_type_arry_all= array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/vnd.ms-excel',
		'.csv',
		'.zip',
		'.rar',
		'image/gif',
		'image/jpeg',
		'image/png',
		'application/zip',
		'text/plain',
		'application/msword',
		'application/vnd.ms-powerpoint',
		'text/csv',
		'application/vnd.adobe.air-application-installer-package+zip	air',
		'application/vnd.dece.zip',
		'application/octet-stream'
);



//png    //gif   rar   //doc,xls zip//xlxs   //jpg
$all_upload_file_type_arry =array("13780","7173","8297","208207","8075","255216");

$allowedExts = array("gif", "jpeg", "jpg", "png","doc","docx","xls","xlsx","zip","rar");


//$allow_upload_type_str=implode(',',$allow_upload_type_arry);

$allow_upload_type_str_moban="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,.csv,application/msword";
$allow_upload_type_str_sb="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,.csv,application/msword,.zip,.rar";

$allow_upload_type_str_tupian="image/gif,image/jpeg,image/png";


$file = @fopen($_FILES['Filedata']['tmp_name'], "rb");
$bin = @fread($file, 2); //只读2字节
fclose($file);
$strInfo = @unpack("C2chars", $bin);
$typeCode = intval($strInfo['chars1'].$strInfo['chars2']);

if(!in_array($typeCode,$all_upload_file_type_arry)){
	$data=array(
			'result' => 'false',
			'data'=>array(
					'src'=>''));
	echo json_encode($data);
	exit;

}
 
$uploaddir     = '../../gg_img/';
$namefile=explode('.', $_FILES['Filedata']['name']);
$filename      = date("Ymdhis").rand(100,999).".".end($namefile);


$uploadfile    = $uploaddir . $filename;
try
{
    $temploadfile  = $_FILES['Filedata']['tmp_name'];
    move_uploaded_file($temploadfile , $uploadfile);

 
}
catch(Exception $e)
{
	file_put_contents("1111.text", $e->getCode().$e->getMessage());
}

//返回数据  在页面上js做处理
$filedata = array(
            'result' => 'true',
			'name' => $_FILES['Filedata']["name"],
			'filepath' => "/gg_img/".$filename,
		);
echo json_encode($filedata);
exit;