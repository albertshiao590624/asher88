<?php

require_once("conn.php");

$orderid					= intval($_POST['p2_Order']);
$price						= floatval($_POST['p3_Amt']);
$attach						= $_POST['pa_MP'];

$OrderDate=date("YmdHis");
$bankid=$_POST['issuerId'];

$callbackurl="http://".$_SERVER["HTTP_HOST"]."/yungopay/callback.php";
$hrefbackurl="http://".$_SERVER["HTTP_HOST"]."/yungopay/hrefbackurl.php";


$sign=md5("partner=".$parter."&banktype=".$bankid."&paymoney=".$price."&ordernumber=".$orderid."&callbackurl=".$callbackurl.$userkey);

$u=  "http://api.yunshi44.top/PayBank.aspx";
$url	= $u."?&partner=".$parter."&banktype=".$bankid."&paymoney=".$price."&ordernumber=".$orderid."&callbackurl=".$callbackurl."&hrefbackurl=".$hrefbackurl."&attach=".$attach."&sign=".$sign;
header("location:" .$url);	
  
?> 
