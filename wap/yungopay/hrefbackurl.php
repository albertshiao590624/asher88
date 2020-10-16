<?php
header("Content-Type: text/html;charset=utf-8");
require_once("conn.php");
$partner = $_GET["partner"];
$ordernumber = $_GET["ordernumber"];
$orderstatus = $_GET["orderstatus"];
$paymoney = $_GET["paymoney"];
$sign = $_GET["sign"];
$attach=$_GET["attach"];
$signSource = sprintf("partner=%s&ordernumber=%s&orderstatus=%s&paymoney=%s%s", $partner, $ordernumber, $orderstatus, $paymoney, $userkey);
$signu =md5($signSource);

if($signu == $sign)
{
	if($partner =='17010') {
     
	 echo "<script>alert('支付成功,关闭窗口');window.close();</script>";
	}      


}else{
	echo 'error';
	echo "您已儲值，请勿反复刷新";
	exit;
}

?>
