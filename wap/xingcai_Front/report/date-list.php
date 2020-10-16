<?php
	$para=$_GET;
	//echo $para['uid'];
	// 時間限制
	if($para['fromTime'] && $para['toTime']){
		$fromTime=strtotime($para['fromTime']);
		$toTime=strtotime($para['toTime'])+24*3600;
		$betTimeWhere="and actionTime between $fromTime and $toTime";
		$cashTimeWhere="and c.actionTime between $fromTime and $toTime";
		$rechargeTimeWhere="and r.actionTime between $fromTime and $toTime";
		$fanDiaTimeWhere="and actionTime between $fromTime and $toTime";
		$fanDiaTimeWhere2="and l.actionTime between $fromTime and $toTime";
		$brokerageTimeWhere=$fanDiaTimeWhere2;
	}elseif($para['fromTime']){
		$fromTime=strtotime($para['fromTime']);
		$betTimeWhere="and b.actionTime >=$fromTime";
		$cashTimeWhere="and c.actionTime >=$fromTime";
		$rechargeTimeWhere="and r.actionTime >=$fromTime";
		$fanDiaTimeWhere="and actionTime >= $fromTime";
		$fanDiaTimeWhere2="and l.actionTime >= $fromTime";
		$brokerageTimeWhere=$fanDiaTimeWhere2;
	}elseif($para['toTime']){
		$toTime=strtotime($para['toTime'])+24*3600;
		$betTimeWhere="and b.actionTime < $toTime";
		$cashTimeWhere="and c.actionTime < $toTime";
		$rechargeTimeWhere="and r.actionTime < $toTime";
		$fanDiaTimeWhere="and actionTime < $toTime";
		$fanDiaTimeWhere2="and l.actionTime < $toTime";
		$brokerageTimeWhere=$fanDiaTimeWhere2;
	}else{
		$toTime=strtotime('00:00');
		$betTimeWhere="and b.actionTime > $toTime";
		$cashTimeWhere="and c.actionTime > $toTime";
		$rechargeTimeWhere="and r.actionTime > $toTime";
		$fanDiaTimeWhere="and actionTime > $toTime";
		$fanDiaTimeWhere2="and l.actionTime > $toTime";
		$brokerageTimeWhere=$fanDiaTimeWhere2;
	}
	
	// 帳號限制
	$amountTitle='全部總結';
	if($para['parentId']=intval($para['parentId'])){
		// 帳號ID限制
		$userWhere="and u.parentId={$para['parentId']}";
		$parentIdWhere="and u.parentId={$para['parentId']}";
		$uid=$para['parentId'];
		$userWhere3="and concat(',', u.parents, ',') like '%,$uid,%'";
		$amountTitle='團隊統計';
	}
	if($para['uid']=intval($para['uid'])){
		// 帳號ID限制
		$uParentId=$this->getValue("select parentId from {$this->prename}members where uid=?",$para['uid']);
		$userWhere="and u.uid=$uParentId";
		$uid=$uParentId;
		$userWhere3="and concat(',', u.parents, ',') like '%,$uid,%'";
		$amountTitle='團隊統計';
	}
	if($para['username'] && $para['username']!='帳號名'){
		$para['username']=wjStrFilter($para['username']);
		if(!ctype_alnum($para['username'])) throw new Exception('帳號名包含非法字元,請重新輸入');
		// 帳號名限制
		$userWhere="and u.username='{$para['username']}'";
		$uid=$this->getValue("select uid from {$this->prename}members where username='{$para['username']}'");
		$userWhere3="and concat(',', u.parents, ',') like '%,$uid,%'";
		$amountTitle='團隊統計';
	}

	$sql="select u.username, u.coin, u.uid, u.parentId, sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount, (select sum(c.amount) from ssc_member_cash c where c.`uid`=u.`uid` and c.state=0 $cashTimeWhere) cashAmount,(select sum(r.amount) from ssc_member_recharge r where r.`uid`=u.`uid` and r.state in(1,2,9) $rechargeTimeWhere) rechargeAmount, (select sum(l.coin) from ssc_coin_log l where l.`uid`=u.`uid` and l.liqType in(50,51,52,53) $brokerageTimeWhere) brokerageAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0 $betTimeWhere where 1 $userWhere";
	//echo $sql;exit;
	
	$this->pageSize-=1;
	if($this->action!='betDate') $this->action='betDate';
	$list=$this->getPage($sql .' group by u.uid', $this->page, $this->pageSize);
	if(!$list['total']) {
		$uParentId2=$this->getValue("select parentId from {$this->prename}members where uid=?",$para['parentId']);
		$list=array(
			'total' => 1,
			'data'=>array(array(
				'parentId'=>$uParentId2,
				'uid'=>$para['parentId'],
				'username'=>'沒有下級了'
			))
		);
		$noChildren=true;
	}
	$params=http_build_query($_REQUEST, '', '&');
	$count=array();
	$sql="select sum(coin) from {$this->prename}coin_log where uid=? and liqType between 2 and 3 $fanDiaTimeWhere";
		
	//$sql2="select sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount, (select sum(c.amount) from ssc_member_cash c where c.`uid`=u.`uid` and c.state=0 $cashTimeWhere) cashAmount,(select sum(r.amount) from ssc_member_recharge r where r.`uid`=u.`uid` and r.state in(1,2,9) $rechargeTimeWhere) rechargeAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0 $betTimeWhere $parentIdWhere";
	$sql2="select sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0 $betTimeWhere $userWhere3";
	
	$all=$this->getRow($sql2);
	$all['fanDianAmount']=$this->getValue("select sum(l.coin) from {$this->prename}coin_log l, {$this->prename}members u where l.liqType between 2 and 3 and l.uid=u.uid $fanDiaTimeWhere2 $userWhere3", $var['uid']);
	$all['brokerageAmount']=$this->getValue("select sum(l.coin) from {$this->prename}coin_log l, {$this->prename}members u where l.liqType in(50,51,52,53) and l.uid=u.uid $brokerageTimeWhere $userWhere3", $var['uid']);
	$all['rechargeAmount']=$this->getValue("select sum(r.amount) from {$this->prename}member_recharge r, {$this->prename}members u where r.state in (1,2,9) and r.uid=u.uid $rechargeTimeWhere $userWhere3", $var['uid']);
	$all['cashAmount']=$this->getValue("select sum(c.amount) from {$this->prename}member_cash c, {$this->prename}members u  where c.state=0 and c.uid=u.uid $cashTimeWhere $userWhere3", $var['uid']);
	$all['coin']=$this->getValue("select sum(u.coin) coin from {$this->prename}members u where 1 $userWhere3", $var['uid']);

?>

<table class="tablesorter" cellspacing="0">
<input type="hidden" value="<?=$this->user['username']?>" />
	<thead>
		<tr>
			<td>帳號名</td>
			<td>投注總額</td>
			<td>中獎總額</td>
			<td>總返點</td>
			<td title="包括儲值傭金，註冊傭金，消費傭金，簽到">傭金</td>
			<td>儲值</td>
			<td>提現</td>
			<td>餘額</td>
			<td>盈虧</td>
			<td>團隊盈虧</td>
			<td>查看下級</td>
		</tr>
	</thead>
	<tbody>
	<?php
		if($list['data']) foreach($list['data'] as $var){
		
		if($var['username']!='沒有下級了'){
			$var['fanDianAmount']=$this->getValue($sql, $var['uid']);
			$pId=$var['uid'];
			$var['teamwin']=$this->getValue("select sum(l.coin) fandianAll from {$this->prename}coin_log l, ssc_members u where l.liqType in(2,3) and l.uid=u.uid and concat(',', u.parents, ',') like '%,$pId,%' $fanDiaTimeWhere") + $this->getValue("select sum(b.bonus-b.mode * b.beiShu * b.actionNum) betZjAmount from ssc_members u ,ssc_bets b where u.uid=b.uid and b.isDelete=0 and concat(',', u.parents, ',') like '%,$pId,%' $betTimeWhere");
		}
		
		$count['betAmount']+=$var['betAmount'];
		$count['zjAmount']+=$var['zjAmount'];
		$count['fanDianAmount']+=$var['fanDianAmount'];
		$count['brokerageAmount']+=$var['brokerageAmount'];
		$count['cashAmount']+=$var['cashAmount'];
		$count['coin']+=$var['coin'];
		$count['rechargeAmount']+=$var['rechargeAmount'];
		$count['teamwin']+=$var['teamwin'];
	?>
		<tr>
			<td><?=$this->ifs($var['username'], '--')?></td>
			<td><?=$this->ifs($var['betAmount'], '--')?></td>
			<td><?=$this->ifs($var['zjAmount'], '--')?></td>
			<td><?=$this->ifs($var['fanDianAmount'], '--')?></td>
			<td><?=$this->ifs($var['brokerageAmount'], '--')?></td>
			<td><?=$this->ifs($var['rechargeAmount'], '--')?></td>
			<td><?=$this->ifs($var['cashAmount'], '--')?></td>
			<td><?=$this->ifs($var['coin'], '--')?></td>
			<td><?=$this->ifs($var['zjAmount']-$var['betAmount']+$var['fanDianAmount'], '--')?></td>
			<td><?=$this->ifs($var['teamwin'], '--')?></td>
			<td>
                <?php if(!$noChildren){?>
                <a target="ajax" dataType="html" call="defaultList" href="<?="/admin778899.php/countData/betDateSearch/?parentId={$var['uid']}&fromTime={$para['fromTime']}&toTime={$para['toTime']}"?>">下級</a>
				<?php }?>
                <?php if($var['parentId']){?>
                  <a target="ajax" dataType="html" call="defaultList" href="<?="/admin778899.php/countData/betDateSearch/?uid={$var['uid']} &fromTime={$para['fromTime']}&toTime={$para['toTime']}"?>">上級</a>
				<?php }?>
            </td>
		</tr>
	<?php } ?>
		<tr>
			<td><span class="spn9">本頁總結</span></td>
			<td><?=$this->ifs($count['betAmount'], '--')?></td>
			<td><?=$this->ifs($count['zjAmount'], '--')?></td>
			<td><?=$this->ifs($count['fanDianAmount'], '--')?></td>
            <td><?=$this->ifs($count['brokerageAmount'], '--')?></td>
			<td><?=$this->ifs($count['rechargeAmount'], '--')?></td>
			<td><?=$this->ifs($count['cashAmount'], '--')?></td>
			<td><?=$this->ifs($count['coin'], '--')?></td>
			<td><?=$this->ifs($count['zjAmount']-$count['betAmount']+$count['fanDianAmount'], '--')?></td>
			<td><?=$this->ifs($count['teamwin'], '--')?></td>
			<td></td>
		</tr>
		<tr>
			<td><span class="spn9"><?=$amountTitle?></span></td>
			<td><?=$this->ifs($all['betAmount'], '--')?></td>
			<td><?=$this->ifs($all['zjAmount'], '--')?></td>
			<td><?=$this->ifs($all['fanDianAmount'], '--')?></td>
			<td><?=$this->ifs($all['brokerageAmount'], '--')?></td>
			<td><?=$this->ifs($all['rechargeAmount'], '--')?></td>
			<td><?=$this->ifs($all['cashAmount'], '--')?></td>
			<td><?=$this->ifs($all['coin'], '--')?></td>
			<td><?=$this->ifs($all['zjAmount']-$all['betAmount']+$all['fanDianAmount']+$all['brokerageAmount'], '--')?></td>
			<td>--</td>
			<td></td>
		</tr>
	</tbody>
</table>
<footer>
	<?php
		$rel=get_class($this).'/betDate-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $list['total'], $rel, 'defaultReplacePageAction'); 
	?>
</footer>
