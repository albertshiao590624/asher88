<?php
try
{
    include_once dirname(__FILE__).'/../../config/setting.php';
    include_once dirname(__FILE__).'/../../config/config_upyun.php';
    include_once dirname(__FILE__).'/../../class/upyun.class.php';
    $upyun = new UpYun($config['bucket'], $config['user_name'], $config['pwd']);
    $fh = file_get_contents($_REQUEST['url']);
    if (!empty($fh))
    {    
        $upyunpicpath = $upyun_qrcode_dir.'/'.$_REQUEST['picname'];          
        @$rsp = $upyun->writeFile('/'.$upyunpicpath, $fh, True);   // 上传图片，自动创建目录
        @fclose($fh);
        $file_url ="";
        // file_put_contents('1.txt',var_export($rsp, true));
        if (!empty($rsp))
        {
            $file_url=$upyunhost.$upyunpicpath;
        }
    }
    else
    {
        echo "";exit;
    }
}
catch(Exception $e)
{
    echo "";exit;
}
echo json_encode($file_url);
exit;