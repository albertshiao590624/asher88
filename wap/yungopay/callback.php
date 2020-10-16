<?php
header("Content-Type: text/html;charset=utf-8");
require_once("conn.php");
$partner = $_GET["partner"];
$ordernumber = $_GET["ordernumber"];
$orderstatus = $_GET["orderstatus"];
$paymoney = $_GET["paymoney"];
$sign = $_GET["sign"];
$attach=$_GET["attach"];
$signSource = sprintf("partner=%s&ordernumber=%s&orderstatus=%s&paymoney=%s%s",$partner,$ordernumber,$orderstatus,$paymoney,$userkey);
$signu =md5($signSource);
$czzs =0;
if($signu == $sign) 
{
	if($orderstatus=='1'&&$partner =='17010') 
	{
		$Amount=$paymoney;
		$BillNo=$ordernumber;
		$conn = mysql_connect($hostname,$dbuser,$dbpasswd);
		mysql_query("SET NAMES 'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
		if (!$conn)
		{
			die('Could not connect: '.mysql_error());
		}
		mysql_select_db($dbname,$conn)or die("Unable to select database!");
		$query = mysql_query("select * from blast_member_recharge where state=0 AND rechargeid= '".$BillNo."'");
		$recharge = mysql_fetch_assoc($query);
		if($recharge)
		{
			$query = mysql_query("select * from blast_members where uid= '".$recharge['uid']."'");
			$user = mysql_fetch_assoc($query);
			if ($user)
			{
				$query = mysql_query("select * from blast_coin_log where uid=".$recharge['uid']." AND extfield1='".$BillNo."'");
				$coinRow = mysql_fetch_assoc($query);
				if (!$coinRow)
				{
					$sql = "INSERT INTO blast_coin_log (uid,type,playedId,coin,userCoin,fcoin,liqType,actionUID,actionTime,actionIP,info,extfield0,extfield1) VALUES ('".$recharge['uid']."',0,0,'".$Amount."','".$user['coin']."'+'".$Amount."',0,1,0,UNIX_TIMESTAMP(),'".$recharge['actionIP']."','在线自动儲值','".$recharge['id']."','".$BillNo."')";
					mysql_query($sql);
					mysql_query("UPDATE blast_members SET coin = coin+'".$Amount."' WHERE uid = '".$recharge['uid']."'");
				}
				mysql_query("UPDATE blast_member_recharge SET state=2,rechargeTime=UNIX_TIMESTAMP(),rechargeAmount='".$Amount."',coin='".$user['coin']."', info='在线自动儲值',flag=1 where rechargeid='".$BillNo."'");
			}
		}
		@mysql_close($conn);
	}
	echo 'ok';
}
?>