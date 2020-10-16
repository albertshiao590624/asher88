
<?php
	//echo $this->userType;
	$para=$_GET;
	
	if($para['state']==5){
		$whereStr = " and b.isDelete=1 ";
	}else{
		$whereStr = " and  b.isDelete=0 ";	
	}
	// 彩種限制
	if($para['type']){
		$para['type']=intval($para['type']);
		$whereStr .= " and b.type={$para['type']}";
	}
	
	// 時間限制
	if($para['fromTime'] && $para['toTime']){
		$whereStr .= ' and b.actionTime between '.strtotime($para['fromTime']).' and '.strtotime($para['toTime']);
	}elseif($para['fromTime']){
		$whereStr .= ' and b.actionTime>='.strtotime($para['fromTime']);
	}elseif($para['toTime']){
		$whereStr .= ' and b.actionTime<'.strtotime($para['toTime']);
	}else{
		
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']){
			$whereStr .= ' and b.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
		}
	}
	
	// 投注狀態限制
	if($para['state']){
	switch($para['state']){
		case 1:
			// 已派獎
			$whereStr .= ' and b.zjCount>0';
		break;
		case 2:
			// 未中獎
			$whereStr .= " and b.zjCount=0 and b.lotteryNo!='' and b.isDelete=0";
		break;
		case 3:
			// 未開獎
			$whereStr .= " and b.lotteryNo=''";
		break;
		case 4:
			// 追號
			$whereStr .= ' and b.zhuiHao=1';
		break;
		case 5:
			// 撤單
			$whereStr .= ' and b.isDelete=1';
		break;
		}
	}
	
	// 模式限制
	$para['mode']=floatval($para['mode']);
	if($para['mode']) $whereStr .= " and b.mode={$para['mode']}";
	
   //單號
   $para['betId']=wjStrFilter($para['betId']);
   if($para['betId'] && $para['betId']!='輸入單號'){
	   if(!ctype_alnum($para['betId'])) throw new Exception('單號包含非法字元,請重新輸入');
	   $whereStr .= " and b.wjorderId='{$para['betId']}'";
   }
   
   //帳號限制
   $whereStr .= " and b.uid={$this->user['uid']}";

	$sql="select b.*, u.username from {$this->prename}bets b, {$this->prename}members u where b.uid=u.uid";
	$sql.=$whereStr;
	$sql.=' order by id desc, actionTime desc';
	
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	//print_r($data);
	$params=http_build_query($para, '', '&');
	
	$modeName=array('2.000'=>'元', '0.200'=>'角', '0.020'=>'分', '0.002'=>'厘','1.000'=>'1元');
?>


<div class="row">
                 <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>單號</th>
                                    <th>彩種</th>
									<!--th>期號</th-->
                                    <th>獎金</th>
									<!--th>狀態</th-->
									<!--td>下注時間</td-->
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody class="table_b_tr">
						<?php if($data['data']){foreach($data['data'] as $var){ ?>
                                <tr class="gradeX">
                                    <td><a href="/index.php/record/betInfo/<?=$var['id']?>" width="80%" title="投注信息" button="關閉:defaultModalCloase" target="modal"><?=$var['wjorderId']?></td>
                                    <td><?=$this->ifs($this->types[$var['type']]['shortName'],$this->types[$var['type']]['title'])?></td>
									<!--td><?=$var['actionNo']?></td-->
                                    <td><?=$this->iff($var['lotteryNo'], number_format($var['bonus'], 3), '0.000')?></td>
                                 
									
			<!--td>
			<?php
				if($var['isDelete']==1){
					echo '<font color="#999999">已撤單</font>';
				}elseif(!$var['lotteryNo']){
					echo '<font color="#009900">未開獎</font>';
				}elseif($var['zjCount']){
					echo '<font color="red">已派獎</font>';
				}else{
					echo '未中獎';
				}
			?></td-->
				<!--td><?=date('m-d H:i:s', $var['actionTime'])?></td-->	<!--td>下注時間</td-->
     <td>
			 <?php if($var['lotteryNo'] || $var['isDelete']==1 || $var['kjTime']<$this->time || $var['type']==34 || $var['type']==77){ ?>
				--
			<?php }else{ ?>
				<a href="/index.php/game/deleteCode/<?=$var['id']?>" dataType="json" call="deleteBet" title="是否確定撤單" target="ajax">撤單</a>
			<?php } ?></td>
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
    $(document).ready(function() {
              $('.dataTables-example').dataTable( {
              //跟陣列下標一樣，第一列從0開始，這裡表格初始化時，第四列默認降冪
                "order": [[ 3, "desc" ]]
              } );
            } );
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
