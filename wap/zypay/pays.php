<?php

header("Content-type: text/html; charset=utf-8");
$pay_memberid = "10075";   //商戶ID
$pay_orderid = $_POST['p2_Order'].'-6666';     //訂單號
$pay_amount = $_POST["p3_Amt"];   //交易金額
$pay_applydate = date("Y-m-d H:i:s");  //訂單時間
$pay_bankcode = "WXZF";   //銀行編碼
$pay_notifyurl = 'http://'.$_SERVER['HTTP_HOST'].'/zypay/server.php';   //服務端返回位址
$pay_callbackurl = 'http://'.$_SERVER['HTTP_HOST'].'/zypay/page.php';  //頁面跳轉返回位址
$Md5key = "lxb0a43znafi0texeug37w22g3bkpr";   //金鑰
$tjurl = "http://pay.yunshi44.top/Pay_Index.html";   //提交地址

$jsapi = array(
    "pay_memberid" => $pay_memberid,
    "pay_orderid" => $pay_orderid,
    "pay_amount" => $pay_amount,
    "pay_applydate" => $pay_applydate,
    "pay_bankcode" => $pay_bankcode,
    "pay_notifyurl" => $pay_notifyurl,
    "pay_callbackurl" => $pay_callbackurl,
);

ksort($jsapi);
$md5str = "";
foreach ($jsapi as $key => $val) {
    $md5str = $md5str . $key . "=" . $val . "&";
}
//echo($md5str . "key=" . $Md5key."<br>");
$sign = strtoupper(md5($md5str . "key=" . $Md5key));
$jsapi["pay_md5sign"] = $sign;
$jsapi["pay_tongdao"] =$_POST['td']; //通道
$jsapi["pay_productname"] = '會員服務'; //商品名稱

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head runat="server">
 <title>線上支付</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body onLoad="document.dinpayForm.submit()">
 <form class="form-inline" method="post" action="<?php echo $tjurl; ?>" name="dinpayForm">
                <?php
                foreach ($jsapi as $key => $val) {
                    echo '<input type="hidden" name="' . $key . '" value="' . $val . '">';
                }
                ?>
               
            </form>
 線上支付中...
</body>
</html>


