<?php
@session_start();
class Team extends WebLoginBase{
	public $pageSize=14;
	private $vcodeSessionName='blast_vcode_session_name';
	public function getMyUserCount1(){
		$this->getSystemSettings();
		$minFanDian=$this->user['fanDian'] - 10 * $this->settings['fanDianDiff'];
		$sql="select count(*) registerUserCount, fanDian from {$this->prename}members where parentId={$this->user['uid']} and fanDian>=$minFanDian and fanDian<{$this->user['fanDian']} group by fanDian order by fanDian desc";
		$data=$this->getRows($sql);
		$ret=array();
		$fanDian=$this->user['fanDian'];
		$i=0;
		$set=explode(',', $this->settings['fanDianUserCount']);
		while(($fanDian-=$this->settings['fanDianDiff']) && ($fanDian>=$minFanDian)){
			$arr=array();
			if($data[0]['fanDian']==$fanDian){
				$arr=array_shift($data);
			}else{
				$arr['fanDian']=$fanDian;
				$arr['registerUserCount']=0;
			}
			$arr['setting']=$set[$i];
			//var_dump($fanDian);
			$ret["$fanDian"]=$arr;
			$i++;
		}
		return ($ret);
	}
	
	public function getMyUserCount(){
		if(!$set=$this->settings['fanDianUserCount']) return array();
		$set=explode(',', $set);
		
		foreach($set as $key=>$var){
			$set[$key]=explode('|', $var);
		}
		
		foreach($set as $var){
			if($this->user['fanDian']>=$var[1]) break;
			array_shift($set);
		}
		
	}

	public final function onlineMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-online-list.php');
	}
	
	/*遊戲記錄*/
	public final function gameRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('team/record.php');
	}
	
	public final function searchGameRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->getTypes();
		$this->getPlayeds();
		$this->display('team/record-list.php');
	}
	/*遊戲記錄 結束*/
	
	/*團隊報表*/
	public final function report(){
        if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->action='searchReport';
		$this->display('team/report.php');
	}
	
	public final function searchReport(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/report-list.php');
	}
	/*團隊報表 結束*/
	
	/*帳變列表*/
	public final function coin(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->action='searchCoin';
		$this->display('team/coin.php');
	}
	
	public final function searchCoin(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/coin-log.php');
	}
	/*帳變列表 結束*/
	
	public final function coinall(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->freshSession();
		$this->display('team/coinall.php');
	}
	
	public final function addMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/add-member.php');
	}
	public final function userUpdate($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/update-menber.php', 0, intval($id));
	}
	public final function userUpdate2($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/menber-recharge.php', 0, intval($id));
	}
	public final function memberList(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-list.php');
	}
	
	public final function cashRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/cash-record.php');
	}
	
	public final function searchCashRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/cash-record-list.php');
	}
	public final function addLink(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/add-link.php');
	}
	public final function linkDelete($lid){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/delete-link.php',0,intval($lid));
	}
	public final function linkList(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/link-list.php');
	}
	public final function getLinkCode($lid){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/get-linkcode.php',0,intval($lid));
	}
	public final function advLink(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/link-list.php');
	}

	public final function insertLink(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->getSystemSettings();
		if(!$_POST)  throw new Exception('提交資料出錯，請重新操作');

        $update['uid']=intval($_POST['uid']);
		$update['type']=intval($_POST['type']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['regIP']=$this->ip(true);
		$update['regTime']=$this->time;

        if($update['fanDian']<0) throw new Exception('返點不能小於0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返點不能大於'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['type']!=0 && $update['type']!=1) throw new Exception('類型出錯，請重新操作');
		if($update['uid']!=$this->user['uid']) throw new Exception('只能增加自己的推廣連結!');

		// 查檢返點設置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']) throw new Exception(sprintf('返點只能是%.1f%的倍數', $this->settings['fanDianDiff']));
		}else{
			$update['fanDian']=0.0;
		}
		$this->beginTransaction();
		try{
			$sql="select fanDian from {$this->prename}links where uid={$update['uid']} and fanDian=? ";
			if($this->getValue($sql, $update['fanDian'])) throw new Exception('此連結已經存在');
			if($this->insertRow($this->prename .'links', $update)){
				$id=$this->lastInsertId();	
				$this->commit();
				return '新增連結成功';
			}else{
				throw new Exception('新增連結失敗');
			}
			
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
	/*編輯註冊連結*/
	public final function linkUpdate($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/update-link.php', 0, intval($id));
	}
	
	public final function linkUpdateed(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$_POST)  throw new Exception('提交資料出錯，請重新操作');

		$update['lid']=intval($_POST['lid']);
		$update['type']=intval($_POST['type']);
        $update['fanDian']=floatval($_POST['fanDian']);
		$update['updateTime']=$this->time;
		$lid=$update['lid'];

		if($update['fanDian']<0) throw new Exception('返點不能小於0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返點不能大於'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
        if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']) throw new Exception('只能修改自己的推廣連結!');
		}else{
			throw new Exception('此註冊連結不存在');
			}
		
		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;

		if($this->updateRows($this->prename .'links', $update, "lid=$lid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出錯');
		}
		
	}
	
	/*刪除註冊連結*/
	public final function linkDeleteed(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$lid=intval($_POST['lid']);
		if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']) throw new Exception('只能刪除自己的推廣連結!');
		}else{
			throw new Exception('此註冊連結不存在');
			}
		$sql="delete from {$this->prename}links where lid=?";
		if($this->update($sql, $lid)){
			return '刪除成功';
		}else{
			throw new Exception('未知出錯');
		}
	}

	public final function searchMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-search-list.php');
	}
	
		public final function memberlistlist(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-list-list.php');
	}
	public final function insertMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$_POST) throw new Exception('提交資料出錯，請重新操作');

        //過濾未知欄位
		$update['username']=wjStrFilter($_POST['username']);
		$update['qq']=wjStrFilter($_POST['qq']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$update['password']=$_POST['password'];
		$update['type']=1;
        
		//接收參數檢查
		//if(strtolower($_POST['vcode'])!=$_SESSION[$this->vcodeSessionName]) throw new Exception('驗證碼不正確。');
		//清空驗證碼session
	  //  unset($_SESSION[$this->vcodeSessionName]);
		if($update['fanDian']<0) throw new Exception('返點不能小於0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返點不能大於'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if(!$update['username']) throw new Exception('帳號名不能為空，請重新操作');
		if($update['type']!=0 && $update['type']!=1) throw new Exception('類型出錯，請重新操作');

		if(!ctype_alnum($update['username'])) throw new Exception('帳號名包含非法字元,請重新輸入');
		if(!ctype_digit($update['qq'])) throw new Exception('QQ包含非法字元');

		$userlen=strlen($update['username']);
		$passlen=strlen($update['password']);
		$qqlen=strlen($update['qq']);

		if($userlen<4 || $userlen>16) throw new Exception('帳號名長度不正確,請重新輸入');
		if($passlen<6) throw new Exception('密碼至少六位元,請重新輸入');
		if($qqlen<5 || $qqlen>11) throw new Exception('QQ號為5-11位,請重新輸入');

		$update['parentId']=$this->user['uid'];
		$update['parents']=$this->user['parents'];
		$update['password']=md5($update['password']);
		$update['source']=1;
		
		$update['regIP']=$this->ip(true);
		$update['regTime']=$this->time;
		
		if(!$_POST['nickname']) $update['nickname']='未設暱稱';
		if(!$_POST['name']) $update['name']=$update['username'];
		
		// 查檢返點設置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']) throw new Exception(sprintf('返點只能是%.1f%的倍數', $this->settings['fanDianDiff']));
			
			$count=$this->getMyUserCount();
			$sql="select userCount, (select count(*) from {$this->prename}members m where m.parentId={$this->user['uid']} and m.fanDian=s.fanDian) registerCount from {$this->prename}params_fandianset s where s.fanDian={$update['fanDian']}";
			$count=$this->getRow($sql);
			
			if($count && $count['registerCount']>=$count['userCount']) throw new Exception(sprintf('對不起返點為%.1f的下級人數已經達到上限', $update['fanDian']));
		}else{
			$update['fanDian']=0.0;
		}
		
		$this->beginTransaction();
		try{
			$sql="select username from {$this->prename}members where username=?";
			if($this->getValue($sql, $update['username'])) throw new Exception('帳號“'.$update['username'].'”已經存在');
			if($this->insertRow($this->prename .'members', $update)){
				$id=$this->lastInsertId();
				$sql="update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
				$this->update($sql);
				
				$this->commit();
				
				return '新增會員成功';
			}else{
				throw new Exception('新增會員失敗');
			}
			
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
	public final function userUpdateed(){
	
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$_POST) throw new Exception('提交資料出錯，請重新操作');
        
		//過濾未知欄位
		$update['type']=intval($_POST['type']);
		$update['uid']=intval($_POST['uid']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$uid=$update['uid'];

        if($update['fanDian']<0) throw new Exception('返點不能小於0');
		$fandian=$this->getvalue("select fanDian from {$this->prename}members where uid=?",$update['uid']);
		if($update['fanDian']<$fandian) throw new Exception('返點不能降低!');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返點不能大於'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['type']!=0 && $update['type']!=1) throw new Exception('類型出錯，請重新操作');

		if($uid==$this->user['uid']) throw new Exception('不能修改自己的返點');
		if(!$parentId=$this->getvalue("select parentId from {$this->prename}members where uid=?",$uid)) throw new Exception('此會員不存在!');
		if($parentId!=$this->user['uid']) throw new Exception('此會員不是你的直屬下線，無法修改');

		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;
		
		if($this->updateRows($this->prename .'members', $update, "uid=$uid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出錯');
		}
		
	}
	
 /*額度轉移*/
	public final function userUpdateed2(){
		
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$para=$_POST) throw new Exception('提交資料出錯，請重新操作');
		$this->getSystemSettings();
		if($this->settings['recharge']!=1) throw new Exception('上級儲值功能已經關閉！');

		$uid=intval($para['uid']);
		$amount=floatval($para['coin']);
		$coinpwd=wjStrFilter('safepass','',1);
		if(!$uid){
			throw new Exception('帳號ID不正確');
		}
		$amount=floatval(abs($amount));
		if($amount<=0) throw new Exception('儲值金額不能為負值');
		if(!$coinpwd) throw new Exception('請輸入資金密碼');
		$this->freshSession();
		if($this->user['coinPassword']!=md5($coinpwd)) throw new Exception('資金密碼不正確');
		$data=array(
			'amount'=>$amount,
			'actionUid'=>$this->user['uid'],
			'actionIP'=>$this->ip(true),
			'actionTime'=>$this->time,
			'rechargeTime'=>$this->time
		);
		$this->beginTransaction();
		try{
			$user=$this->getRow("select uid, username, coin, fcoin from {$this->prename}members where uid=$uid");
			if(!$user) throw new Exception('帳號不存在');
			// 查詢帳號可用資金
			$userAmount=$this->getValue("select coin from {$this->prename}members where uid={$this->user['uid']}");
			if($userAmount < $amount) throw new Exception('您的可用資金不足');
			$data['uid']=$user['uid'];
			$data['coin']=$user['coin'];
			$data['fcoin']=$user['fcoin'];
			$data['username']=$user['username'];
			$data['info']='上級['.$this->user['username'].']儲值';
			$data['state']=2;
			$data['flag']=1;

			$sql="select id from {$this->prename}member_recharge where rechargeId=?";
			do{
				$data['rechargeId']=mt_rand(100000,999999);
			}while($this->getValue($sql, $data['rechargeId']));

			if($this->insertRow($this->prename .'member_recharge', $data)){
				$dataId=$this->lastInsertId();
				$this->addCoin(array(
					'uid'=>$user['uid'],
					'typea'=>1,
					'liqType'=>12,
					'coin'=>$amount,
					'extfield0'=>$dataId,
					'extfield1'=>$data['rechargeId'],
					'info'=>'上級儲值'
				));
				
				//扣除
				$this->addCoin(array(
					'uid'=>$this->user['uid'],
					'typea'=>1,
					'liqType'=>13,
					'coin'=>-$amount,
					'extfield0'=>$dataId,
					'extfield1'=>$data['rechargeId'],
					'info'=>'上級儲值成功扣款'
				));
			}		
			$this->commit();
			echo "儲值成功";
		}catch(Exception $e){
			$this->rollBack();
			throw new Exception('未知出錯');
		}
	}
	public final function shareBonus(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/share-bonus.php');
	}

	public final function shareBonusInfo(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/share-bonus-info.php');
	}

	public final function getShareBonus(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$uid = $this->user['uid'];
		if(!$uid) die('參數出錯');
		$sql = 'select * from {$this->prename}bonus_log where uid='.$this->user['uid'].' and bonusStatus = 0 order by id DESC Limit 1';
		$lastBonus = $this->getRow($sql);
		if($lastBonus){
			//直接將使用者分紅提現，提現資訊提交至後臺
			$bank=$this->getRow("select * from {$this->prename}member_bank where uid=? limit 1",$this->user['uid']);
			if($bank['bankId']){
				$para['username']=$bank['username'];
				$para['account']=$bank['account'];
				$para['bankId']=$bank['bankId'];
		$this->beginTransaction();
		try{
			$this->freshSession();
			// 插入提現請求表
			$para['actionTime']=$this->time;
			$para['uid']=$this->user['uid'];
			$para['info']= '分紅提現';
			$para['amount'] = $lastBonus['bonusAmount'];
			if(!$this->insertRow($this->prename .'member_cash', $para)) throw new Exception('領取分紅請求出錯');
			if(!$this->updateRows($this->prename .'bonus_log', array('bonusStatus'=>1), 'id='.$lastBonus['id'])) throw new Exception('領取分紅請求出錯');
			$id=$this->lastInsertId();
			
			$this->commit();
			echo '分紅提現成功，分紅提現將在10分鐘內到帳，如未到賬請聯繫線上客服。';
		
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
			}else{
				die('您還沒有設置銀行帳戶，不可領取分紅！！！');
			}
		}else{
			die('您本期沒有可分紅金額或者您已經領取了本期分紅！！！');
		}
	}
}
