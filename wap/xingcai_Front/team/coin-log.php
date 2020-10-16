<?php
	$this->getTypes();
	$this->getPlayeds();
	
	// 日期限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$timeWhere=' and l.actionTime between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
	}elseif($_REQUEST['fromTime']){
		$timeWhere=' and l.actionTime >='. strtotime($_REQUEST['fromTime']);
	}elseif($_REQUEST['toTime']){
		$timeWhere=' and l.actionTime <'. strtotime($_REQUEST['toTime']);
	}else{
		
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
	}
	
	// 帳變類型限制
	if($_REQUEST['liqType']=intval($_REQUEST['liqType'])){
		$liqTypeWhere=' and liqType='.$_REQUEST['liqType'];
		if($_REQUEST['liqType']==2) $liqTypeWhere=' and liqType between 2 and 3';
	}
	
	// 帳號類型限制
	if($_REQUEST['username'] && $_REQUEST['username']!='帳號名'){
		$_REQUEST['username']=wjStrFilter($_REQUEST['username']);
		if(!ctype_alnum($_REQUEST['username'])) throw new Exception('帳號名包含非法字元,請重新輸入');
		$userWhere=" and u.parents like '%,{$this->user['uid']},%' and u.username like '%{$_REQUEST['username']}%'";
	}
	//$userWhere3="concat(',',u.parents,',') like '%,{$this->user['uid']},%'"; //所有人
	if($_REQUEST['userType']){
		switch($_REQUEST['userType']){
			case 1:
				$userWhere=" and u.uid={$this->user['uid']}";
			break;
			case 2:
				$userWhere=" and u.parentId={$this->user['uid']}";
			break;
			case 3:
				$userWhere="and concat(',', u.parents, ',') like '%,{$this->user['uid']},%'  and u.uid!={$this->user['uid']}";
			break;

		}
	}else{$userWhere=" and u.parentId={$this->user['uid']}";}

	
	// 凍結查詢
	if($this->action=='fcoinModal'){
		$fcoinModalWhere='and l.fcoin!=0';
	}
	
	$sql="select b.type, b.playedId, b.actionNo, b.mode, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType not in(4,11,104) order by l.id desc";
	//echo $sql;
	
	$list=$this->getPage($sql, $this->page, $this->pageSize);
	$params=http_build_query($_REQUEST, '', '&');
	$modeName=array('2.000'=>'元', '0.200'=>'角', '0.020'=>'分', '0.002'=>'厘','1.000'=>'1元');
	$liqTypeName=array(
		1=>'儲值',
		111=>'卡密儲值',
		2=>'返點',
		//3=>'返點',//分紅
		//4=>'抽水金額',
		5=>'停止追號',
		6=>'中獎金額',
		7=>'撤單',
		8=>'提現失敗返回凍結金額',
		9=>'管理員儲值',
		10=>'解除搶莊凍結金額',
		//11=>'收單金額',
		12=>'上級儲值',
		13=>'上級儲值成功扣款',
		50=>'簽到贈送',
		51=>'首次綁定工行卡贈送',
		52=>'儲值傭金',
		53=>'消費傭金',
		54=>'儲值活動獎金',
		55=>'註冊傭金',
		56=>'至尊傭金獎勵',
		57=>'積分兌換',
		
		100=>'搶莊凍結金額',
		101=>'投注凍結金額',
		102=>'追號投注',
		103=>'搶莊返點金額',
		//104=>'搶莊抽水金額',
		105=>'搶莊賠付金額',
		106=>'提現凍結',
		107=>'提現成功扣除凍結金額',
		108=>'開獎扣除凍結金額',
		120=>'幸運大轉盤贈送',
		130=>'幸運砸蛋贈送',
		140=>'存入投資理財',
		150=>'投資理財提款'
	);
	
?>

<div>
<div class="row">
                 <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>帳變類型</th>
                                    <th>單號</th>
                                    <th>金額</th>
                                    <th>餘額</th>
                                </tr>
                            </thead>
                            <tbody class="table_b_tr">
						<?php if($list['data']) {foreach($list['data'] as $var){ ?>
                                <tr class="gradeX">
                                    <td><?=$liqTypeName[$var['liqType']]?></td>
									
								<?php if($var['extfield0'] && in_array($var['liqType'], array(2,3,4,5,6,7,10,11,100,101,102,103,104,105,108))){ ?>
                <td><a href="/index.php/record/betInfo/<?=$var['extfield0']?>" width="95%" title="投注信息" button="關閉:defaultModalCloase" target="modal"><?=$this->getValue("select wjorderId from {$this->prename}bets where id=?", $var['extfield0'])?></a>
                </td>
              
			<?php }elseif(in_array($var['liqType'], array(1,9,52))){?>
                <td><a href="/index.php/cash/rechargeModal/<?=$var['extfield0']?>" width="95%" title="儲值信息" button="關閉:defaultModalCloase" target="modal"><?=$var['extfield1']?></a></td>
                
			<?php }elseif(in_array($var['liqType'], array(8,106,107))){?>
                <td><a href="/index.php/cash/cashModal/<?=$var['extfield0']?>" width="95%" title="提現信息" button="關閉:defaultModalCloase" target="modal"><?=$var['extfield0']?></a></td>
                
                
            <?php }else{ ?>
                <td>--</td>
            <?php } ?>
									
                                    <td><?=number_format($var['coin'],3)?></td>
									<td><?=$var['userCoin']?></td>
		</tr>
	
   	<?php } }else{ ?>
   
    <?php } ?>
                                
                            </tbody>
                        
                        </table>
</div>
</div>
</div>
</div>
</div>

   <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
        });
        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);
        }
    </script>
</body>
</html>
