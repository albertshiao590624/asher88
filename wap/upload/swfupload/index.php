<?php
$picname=$_GET["savenmethod"];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>swfupload</title>
<script src="images/jquery.js" type="text/javascript"></script>
<script>
    /*上传错误信息提示*/
    function showmessage(message){alert(message);}
    /*显示文件名称*/
    function setfilename(ID,filename){
        ID = replaceStr(ID);
        var htmls = '<li id="'+ID+'"><p class="load">0%</p></li>';
        $("#uploadPut").html(htmls);
    }
    /*显示上传进度*/
    function setfileload(ID,load){
        ID = replaceStr(ID);
        $("#"+ID+" .load").html(load);
    }
    /*返回服务上传的数据*/
    function setfilepath(ID,data){
        ID = replaceStr(ID);
        var s = eval('('+data+')');
        if(s.result=="true"){
            //alert('上传成功');
        	window.parent.<?php echo $picname; ?>(s.filepath);
           // $("#"+ID).html("<img id='"+s.id+"' src='"+s.filepath+"'/><br/>"+s.name);
        }
		else if(s.result=="false")
		{
            alert(s.msg);
        }
        else{
            $("#"+ID).html(s.name+"上传失败");
        }
    }
    /*替换特殊字符*/
    function replaceStr(ID){
        var reg = new RegExp("[=,/,\,?,%,#,&,(,),!,+,-,},{,:,>,<]","g"); //创建正则RegExp对象
        var ID = ID.replace(reg,"");
        return ID;
    }
</script>
</head>
<style>
.uploadPut {
	width: 100%;
	clear: both;
}

ul,li {
	margin: 0px;
	padding: 0px;
	list-style: none
}

.uploadPut li {
	width: 100px;
	text-align: center;
	border: 1px solid #ccc;
	overflow: hidden;
	background-color: #e1e1e1;
	line-height: 10px;
	height:30px;
	float: left;
	
}

.uploadPut li  p{

	line-height: 10px;
	margin: 10px;
	
	
}



</style>
<body>
  		<?php
		//获取项目跟路径
		 $serc=$_SERVER ['SERVER_NAME'];
		 if(strpos("111".$serc,'192')>0||strpos("111".$serc,'127')>0){
  	
		$baseURL = 'http://' . $_SERVER ['SERVER_NAME'] . (($_SERVER ['SERVER_PORT'] == 80) ? '' : ':' . $_SERVER ['SERVER_PORT']) . ((($path = str_ireplace ( '\\', '/', dirname ( $_SERVER ['SCRIPT_NAME'] ) )) == '/') ? '' : $path);
		 }else{
		 		$baseURL = 'http://' . $_SERVER ['SERVER_NAME'] .  ((($path = str_ireplace ( '\\', '/', dirname ( $_SERVER ['SCRIPT_NAME'] ) )) == '/') ? '' : $path);
		 }
		//设置swfupload参数
		$flashvars = 'uploadURL=' . urlencode ( $baseURL . '/upload.php'.(isset($_GET["gg3"])?'?gg3':'') ); #上传提交地址
		$flashvars .= '&buttonImageURL=' . urlencode ( $baseURL . '/images/upload.png' ); #按钮背景图片
		$flashvars .= '&btnWidth=95'; #按钮宽度
		$flashvars .= '&btnHeight=35'; #按钮高度
		$flashvars .= '&fileNumber=1'; #每次最多上传20个文件
		$flashvars .= '&fileSize=200'; #单个文件上传大小为20M
		$flashvars .= '&bgColor=#ffffff'; #背景颜色
		$flashvars .= '&fileTypesDescription=Images'; #选择文件类型
		if (isset($_GET["gg3"]))
		{
			$flashvars .= '&fileType=*.png;'; #选择文件后缀名	
		}
		else
		{
			$flashvars .= '&fileType=*.jpg;*.png;*.gif;*.jpeg'; #选择文件后缀名
		}	
		

		?>
             <object style="float: left;" width="95" height="35"
		data="images/upload.swf" type="application/x-shockwave-flash">
		<param value="transparent" name="wmode">
			<param value="images/upload.swf" name="movie">
				<param value="high" name="quality">
					<param value="false" name="menu">
						<param value="always" name="allowScriptAccess">
				<param value="<?php echo $flashvars;?>" name="flashvars">
	
	</object>

	<span class="uploadPut">
		<ul id="uploadPut">

		</ul>
	</span>



</body>
</html>