<?php
session_start();
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include($C_Patch.'/live/ApiBi/BiApi.class.php');
include($C_Patch.'/include/config.inc.php');


    $zztype = isset($_POST['zz_type']) ? $_POST['zz_type'] : '';
    $yy = isset($_POST['zz_money']) ? trim($_POST['zz_money']) : '';
	$user=$_SESSION['username'];
	 $sql="select * from user_list where user_name='$user'";
	 $res=$mysqli->query($sql);
	 $row=$res->fetch_array();
	
    $conver = doubleval($yy);
    if (($zztype=='12' || $zztype=='11') && ($conver > $row["money"]))
    {
        echo '转账金额不能大于账户余额，请重新输入。';
        exit;
    }
	
	
	$gametype='';
	if($zztype=='12' || $zztype=='22'){
	$gametype='AG';	
     if($zztype=='12'){
		 $about="主账户->AG娱乐";
	 }else if($zztype=='22'){
		  $about="AG娱乐->主账户";
	 }
		
	}else if($zztype=='11' || $zztype=='21'){
		$gametype='BB';	
		
		if($zztype=='11'){
		 $about="主账户->BB娱乐";
	 }else if($zztype=='21'){
		  $about="BB娱乐->主账户";
	 }
	 
	}else if($zztype=='13' || $zztype=='23'){
		$gametype='IBC';	
		
		if($zztype=='13'){
		 $about="主账户->沙巴体育";
	 }else if($zztype=='23'){
		  $about="沙巴体育->主账户";
	 }
	}
	
	
	
	
	
			
			
			$username=$_SESSION['username'];
			$sqlc = "select * from user_list where user_name='$username'";
			$result = $mysqli->query($sqlc);
			$row=$result->fetch_array();

			$mon=$row['money'];
			if($zztype == '11' || $zztype == '12' || $zztype == '13' ){
				
			if($yy>$mon){
			echo "主钱包余额不足";
			exit;
			}
			$res=new BiApi();
			$result=$res->zzmoney($gametype,$username,'IN',$yy);
			//var_dump($result);die;
			if($result){//儲值成功
			$res_money=$mon-$yy;
			$billNO = $username.date('YmdHis',time());
			//$about="转入".$gametype;
			$sql1		=	"insert into money_log(`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) values('".$row["user_id"]."','$billNO','$about','".date("Y-m-d H:i:s")."','真人转账','".abs($yy)."','".$row["money"]."',".($row["money"]-abs($yy)).")";
			$mysqli->query($sql1);
			$sql2		=	"insert into zz_info(uid,username,old_money,status,amount,new_money,type,info,actionTime,result,billNO) values(".$row["user_id"].",'$username',$mon,1,$yy,$res_money,".$_REQUEST["zz_type"].",'转入沙巴', ".time().",'转帐成功','$billNO')";
			$mysqli->query($sql2);	
			
			$sql="update user_list set money=$res_money where user_name='$username'";
			$arr=$mysqli->query($sql);
			$mysqli->commit();
			echo '转换成功';
			exit;
		}else{
			echo '转换失败';
			exit;
		}
			
			
			}else if($zztype == '21' || $zztype == '22' || $zztype == '23' ){
				$res=new BiApi();
			$result=$res->zzmoney($gametype,$username,'OUT',$yy);
				if($result){//提现成功
			$res_money=$mon+$yy;
		//echo $mon.'#'.$yy;die;
			$billNO = $username.date('YmdHis',time());
			//$about=$gametype."提现";
			$sql1		=	"insert into money_log(`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) values('".$row["user_id"]."','$billNO','$about','".date("Y-m-d H:i:s")."','真人转账','".abs($yy)."','".$row["money"]."',".($row["money"]-abs($yy)).")";
			$mysqli->query($sql1);
			$sql2		=	"insert into zz_info(uid,username,old_money,status,amount,new_money,type,info,actionTime,result,billNO) values(".$row["user_id"].",'$username',$mon,1,$yy,$res_money,".$_REQUEST["zz_type"].",'PT提现', ".time().",'转帐成功','$billNO')";
			$mysqli->query($sql2);	
			
			$sql="update user_list set money=$res_money where user_name='$username'";
			$arr=$mysqli->query($sql);
			$mysqli->commit();
			echo '转换成功';
			exit;
	}else{
		echo '转换失败';
	}
			}
		
		
		

		
		
		
		
    


?>