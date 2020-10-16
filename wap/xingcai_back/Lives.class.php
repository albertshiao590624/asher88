<?php
	include_once 'Des.php';
class Lives extends WebBase{
	protected $key='HdsdmIlN';                                     //網站秘鑰
	
	protected $WebSiteCode='3b8000f1-4387-44c5-ae06-caf0c9b7e634'; //網站code
	
	protected $password='1234567'; 	

	protected $biUrl = 'api.bisoft.me';

	public final function moeny(){
		$id = $_GET['id'];
		// echo $id;
		$data = $this->user;
		$data['index'] = $id;  
		return $this->display('/live/liveInfo.php',0,$data);
	}

	public final function getCoin($ajax = true){
		if($this->user['testFlag']==0){
			$coin =  $this->getValue("select coin from blast_members where uid = ?",$this->user['uid']);
			$this->user['coin'] = $coin;
		}else{
			$coin =  $this->getValue("select coin from blast_guestmembers where uid = ?",$this->user['uid']);
		}
		// print_r($this->user);
		if($ajax){
			echo json_encode(number_format($coin,2));
		}else{
			return $coin;
		}
	}
		/**
		 * [balances 查詢額度]
		 * @param  [type] $game [description]
		 * @param  [type] $user [description]
		 * @return [type]       [description]
		 */
	public final  function balances()		
	{
		$game = $_POST['game'];
		$user = $this->user['username'];
		$des = new JoDES();
		$t=time();
		$pp=($des->encode('platformCode='.$game.'&userName='.$user.'&userPassWord='.$this->password.'&TimeStamp='.$t,$this->key));
		$url='http://'.$this->biUrl.'/Api/GetUserBalance?parameter='.$pp.'&WebSiteCode='.$this->WebSiteCode;
		$res=$this->https_request($url);
		// var_dump($pp);exit;
		if($res['res'] !== '帳號不存在'){
			// echo number_format($res['retMsg'],2);
			print_r($res['retMsg']);
			die;
			//echo $res['retMsg'];
		}else{
			echo json_encode('未登錄'.$game.'遊戲');
		}
	}



	// 轉入額度
	public final function zamount(){
		// 獲取額度和遊戲
		$game = $_POST['game'];
		$amount = $_POST['amount'];
		$msg = array();
		 // echo json_encode('1');exit;
		// 判斷餘額是否大於轉入額度
		$coin  = $this->getCoin(false);
		
		if($coin < $amount){
			$msg['state'] = '0';
			$msg['msg'] = '您的餘額不足';
			// $msg['msg'] = $this->user['coin'];
			echo json_encode($msg);
			exit;
		}

		// 準備sql語句
		if($game == 'AG'){
			$about = '主帳戶->AG';
		}else if($game == 'BB'){
			$about = '主帳戶->BB';
		}else if($game == 'PT'){
			$about = '主帳戶->PT';
		}else if($game == 'MG'){
			$about = '主帳戶->MG';
		}else if($game == 'SunBet'){
			$about = '主帳戶->申博';
		}else if($game == 'KY'){
			$about = '主帳戶->開元棋牌';
		}
		
		
		// 開始轉入
		$result = $this->moneyBase($game,$this->user['username'],'IN',$amount);
		// echo json_encode($result);exit;
		if($result === true){//儲值成功！
			$billNO = $username.date('YmdHis',time());
			//$about="轉入".$gametype;
			$log = array(
				'user_id'=>$this->user["uid"],
				'order_num'=>$billNO,
				'about' => $about,
				'update_time'=>date("Y-m-d H:i:s"),
				'type'=>'真人轉帳',
				'order_value'=>abs($amount),
				'assets'=>$this->user['coin'],
				'balance'=>$this->user['coin']-abs($amount)
			);
			$coin = $this->user['coin']-abs($amount);
			$this->update("update {$this->prename}members set coin='{$coin}' where uid=?", $this->user['uid']);
			if($this->insertRow('money_log', $log)){
				$msg['state'] = '1';
				$msg['msg'] = '轉換成功';
				echo json_encode($msg);
				exit;
			}else{
				$msg['state'] = '0';
				$msg['msg'] = '新增日誌失敗';
				echo json_encode($msg);
				exit;
			}

		}else{
				$msg['state'] = '0';
				$msg['msg'] = $result['retMsg'];
				echo json_encode($msg);
				exit;
		}
		// 轉入成功 新增轉入日誌
		// 把帳號餘額減去本次轉入的額度
		// 返回執行結果 1 成功 2失敗


	}

	// 轉出額度
	public final function pamount(){
		$game = $_POST['game'];
		$amount = $_POST['amount'];
		$msg = array();
		 // echo json_encode('1');exit;
		// 判斷餘額是否大於轉入額度
		// if($this->user['coin'] < $amount){
		// 	$msg['state'] = '0';
		// 	$msg['msg'] = '您的餘額不足';
		// 	echo json_encode($msg);
		// 	exit;
		// }
		// 準備sql語句
		if($game == 'AG'){
			$about = 'AG->主帳戶';
		}else if($game == 'BB'){
			$about = 'BB->主帳戶';
		}else if($game == 'PT'){
			$about = 'PT->主帳戶';
		}else if($game == 'MG'){
			$about = 'MG->主帳戶';
		}else if($game == 'SunBet'){
			$about = '申博->主帳戶';
		}else if($game == 'KY'){
			$about = '開元棋牌->主帳戶';
		}
		
		
		// 開始轉入
		$result = $this->moneyBase($game,$this->user['username'],'OUT',$amount);
		// echo json_encode($result);exit;
		if($result === true){//儲值成功！
			
			$coin  = $this->getCoin(false);
			$coin  += abs($amount);
			$result = $this->update("update {$this->prename}members set coin='{$coin}' where uid=?", $this->user['uid']);
			$billNO = $username.date('YmdHis',time());
			//$about="轉入".$gametype;
			$log = array(
				'user_id'=>$this->user["uid"],
				'order_num'=>$billNO,
				'about' => $about,
				'update_time'=>date("Y-m-d H:i:s"),
				'type'=>'真人轉出',
				'order_value'=>abs($amount),
				'assets'=>$this->user['coin'],
				'balance'=>$this->user['coin']+abs($amount)
			);
			
			// echo json_encode($result);exit;
			if($this->insertRow('money_log', $log)){
				$msg['state'] = '1';
				$msg['msg'] = '轉出成功';
				echo json_encode($msg);
				exit;
			}else{
				$msg['state'] = '0';
				$msg['msg'] = '新增日誌失敗';
				echo json_encode($msg);
				exit;
			}

		}else{
			$msg['state'] = '0';
			$msg['msg'] = $result['retMsg'];
				echo json_encode($msg);
				exit;
		}
	}




	 public function moneyBase($game,$user,$type,$money){         //遊戲  	帳號名	操作	 轉帳IN  轉出OUT'	金額
		$t = time();
		$str_check = "platformCode=" . $game . '&userName=' . $user .'&userPassWord='.$this->password .'&TimeStamp='.$t;
		$DES = new JoDES();
		$str_encheck = $DES->encode($str_check, $this->key);
		if ($type === 'IN')
		{
			$url = 'http://'.$this->biUrl.'/Api/Register?parameter=' . $str_encheck . '&WebSiteCode=' . $this->WebSiteCode;
			$res = $this->https_request($url);
		}
		
        $data = "platformCode=" . $game . '&userName=' . $user . '&transferType=' . $type . '&credit=' . $money.'&TimeStamp='.$t;
        $urlen = ($DES->encode($data, $this->key));
        $url = 'http://'.$this->biUrl.'/Api/Transfer?parameter=' . $urlen . '&WebSiteCode=' . $this->WebSiteCode;
		
        $res = $this->https_request($url);
        // var_dump($url);exit;
        if ($res['retCode'] === 0) {
            return true;
        } else {
            return $res;
        }
	}


	/**
	 * [getBBOrder 獲取額度轉換記錄]
	 * @return [type] [description]
	 */
	public final function getBBOrder(){
		$begin = empty($_GET['time1'])?'':$_GET['time1'];
		$end = empty($_GET['time2'])? '':$_GET['time2'];
		$sql = "SELECT * FROM money_log WHERE user_id=".$this->user['uid'];
		if(!empty($begin) && !empty($end)){
		$sql.=" AND update_time BETWEEN '".$begin." 00:00:00' AND '".$end." 23:59:59' order by update_time desc";
		}else{
			$sql .= ' order by update_time desc limit 0,10';
		}

		echo '                                      ';
		$data = $this->getRows($sql);
		

		return $this->display('live/amountOrder.php',0,$data);
	}

	public final function getBetList(){
		$type = empty($_POST['type'])?'ag':$_POST['type'];
		$begin = empty($_POST['time1'])?'':$_POST['time1'];
		// print_r($_POST);exit;
		$end = empty($_POST['time2'])? '':$_POST['time2'];
		$sql = "SELECT * FROM ".$type."_bet WHERE username= '".$this->user['username']."' ";
		$msg = false;
		if(!empty($begin) && !empty($end)){
			if($begin < date("Y-m-d",strtotime('-7 days'))){
				$msg = '僅支援查詢7天的下注記錄';
				
			}else{
				$sql.=" AND betTime BETWEEN '".$begin." 00:00:00' AND '".$end." 23:59:59' order by betTime desc";
			}
			
		}else{
			$sql .= "order by id desc limit 0,10";
		}
		// echo $sql;exit;
		// 導航座標
		$data = $this->getRows($sql);
		
		switch ($type) {
			case 'ag':
				$amount = 'betAmount';
				$amountN = 'validBetAmount';
				$result = 'netPnl';
				$index = 0;
				break;
			case 'mg':
				$amount  = 'amnt';
				$amountN = 'amnt';
				$result  = 'Win';
				$index   = 1;
				break;	
			case 'bb':
			    $amount  = 'BetAmount';
				$amountN = 'Commissionable';
				$result  = 'Payoff';
				$index = 2;
				break;	
			case 'pt':
			    $amount  = 'BET';
				$amountN = 'BET';
				$result  = 'WIN';
				$index = 3;
				break;	
			case 'sun':
			    $amount  = 'bet';
				$amountN = 'bet';
				$result  = 'win';
				$index = 4;
				break;
		}

		// echo $index;
		
		$All1 = array();
		$All2 = array();
		$All3 = array();
		$num = 0;
		foreach ($data as $key => $value) {
			$All1[$num] = $value[$amount];
			$All2[$num] = $value[$amountN];
			if($index == 1 || $index == 3|| $index == 4){
				if($value[$result] == 0){
					$All3[$num] = '-'.$value[$amount];;	
				}else{
					$All3[$num] = $value[$result];	
				}
			}else{
				$All3[$num] = $value[$result];
			}
			$num++;
		}
// print_r($All1);exit;
		$a1 = array_sum($All1);
		$a2 = array_sum($All2);
		$a3 = array_sum($All3);

		return $this->display('live/BetList.php',0,$data,$type,$index,$msg,$a1,$a2,$a3);


	} 

	/**
	 * 帳號儲值
	 * 插入儲值表返回收款二維碼
	 */
	public final function  userRecharge(){
		// print_r($_POST);exit;
		if($this->user['uid']){
		$rechargeId=$this->getRechId();
		$bankid=$_POST["payId"];
		$uid=$this->user['uid'];
		$amount=floatval($_POST['amount']);
		$time=date('Y-m-d H:i:s', time());
		if($amount && $uid && $rechargeId){
		// echo $bankid;exit;
			if($this->update("INSERT INTO {$this->prename}order (order_number, username, recharge_amount, state, time) VALUES('{$rechargeId}', '{$uid}', '{$amount}', '0', '{$time}')")){
				$para=array();
				$para['mBankId']=intval($bankid);
				$para['amount']=floatval($amount);
				$para['rechargeId']=$rechargeId;
				$para['actionTime']=$this->time;
				$para['uid']=$this->user['uid'];
				$para['username']=$this->user['username'];
				$para['actionIP']=$this->ip(true);
				if($bankid==281 || $bankid=='ZHIFUBAO'){
				$para['info']='支付寶掃碼儲值';
				}elseif($bankid==286 || $bankid=='WEIXIN'){
				$para['info']='微信掃碼儲值';
				}elseif($bankid==293 || $bankid==292){
				$para['info']='支付寶線上儲值';
				}elseif($bankid==294){
				$para['info']='微信線上儲值';
				}else{
				$para['info']='公司銀行卡入款';
				//$para['depositinfo']='轉帳人姓名:'.$_POST['name'].'<br>存款時間:'.date('Y-m-d H:i:s',time());
				}
				if($this->insertRow($this->prename .'member_recharge', $para)){
					$bank = $this->getrow('SELECT * FROM blast_sysadmin_bank WHERE id=?',$bankid);
					// print_r($bank);
						if($bank['id'] == '281' || $bank['id'] == '286'){
							// 二維碼收款
							$msg = array();
							$msg['err'] = 1;
							$msg['type'] = 1;
							$msg['msg'] = $bank['qrCode'];
							echo json_encode($msg);
							exit;
						}elseif($bank['id'] == '282'){
							$msg = array();
							$msg['err'] = 1;
							$msg['type'] = 2;
							$msg['bankname'] = $bank['name'];
							$msg['account'] = $bank['account'];
							$msg['address'] = $bank['payeeName'];
							echo json_encode($msg);
							exit;
						}elseif($bank['id'] == '292'){
							 
							$msg = array();
							$msg['err'] = 2;
							$msg['url'] = 'http://017789a.com/pay/index.php?amount='.$para['amount'].'&paytype=alipay&uid='.$para['uid'].'&orderid='.$para['rechargeId'].'&bankcode=al';

							echo json_encode($msg);
							exit;
						}elseif($bank['id'] == '293'){
							$msg = array();
							$msg['err'] = 2;
							$msg['url'] = 'http://pay.llf668.com/pay.php?amount='.$para['amount'].'&paytype=wechat&uid='.$para['uid'].'&orderid='.$para['rechargeId'].'&bankcode=wx';

							echo json_encode($msg);
							exit;
						}
					
				}else{	
					$msg = array();
					$msg['err'] = 0;
					$msg['msg'] = '儲值訂單生成出錯';
					echo json_encode($msg);
					exit;
				}		
			}else{
				$msg = array();
					$msg['err'] = 0;
					$msg['msg'] = '操作錯誤';
					echo json_encode($msg);
			exit;	
			}
		}
		}
	}
	
	public function serialization($array){
		$arr;
		foreach ($array as $key=>$value){
			$arr[$key] = $key;
		}
		sort($arr);
		$str = "";
		foreach ($arr as $k => $v) {
			if($k ==0){
				$str =$v.'='.$array[$v];
			}else{
				$str =$str.'&'.$v.'='.$array[$v];}
		}
		return $str;
	}
	
	public final function toRegister(){
		return $this->display('live/register.php');
	}

    public function https_request($url,$data = null)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);  
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  
		
		
		if (!empty($data))
		{
			curl_setopt($curl, CURLOPT_POST, 1); 
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$output = curl_exec($curl);
		// var_dump($output);exit;
		curl_close($curl);

		$output=json_decode($output,true); 
		return $output;
	}
}


?>
