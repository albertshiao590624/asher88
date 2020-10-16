
<div class="row">
                 <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <!--th>編號</th-->
                                    <th>儲值金額</th>
                                    <th>實際到賬</th>
                                    <th>儲值銀行</th>
									<th>狀態</th>
									<!--th>成功時間</th>
									<th>備註</th-->
                                </tr>
                            </thead>
                            <tbody class="table_b_tr">
						<?php
                $sql="select a.rechargeId,a.amount,a.rechargeAmount,a.info,a.state,a.actionTime,b.name as bankName from {$this->prename}member_recharge a left join {$this->prename}bank_list b on b.id=a.bankId where a.isDelete=0 and a.uid={$this->user['uid']}";
                if($_GET['fromTime'] && $_GET['endTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $endTime=strtotime($_GET['endTime']);
                    $sql.=" and a.actionTime between $fromTime and $endTime";
                }elseif($_GET['fromTime']){
                    $sql.=' and a.actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['endTime']){
                    $sql.=' and a.actionTime<'.(strtotime($_GET['endTime']));
                }else{
					
					if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $sql.=' and a.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
				}
                $sql.=' order by a.id desc';
                
                $pageSize=10;
                
                $list=$this->getPage($sql, $this->page, $pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
                                <tr class="gradeX">
                                    <!--td><?=$this->ifs($var['rechargeId'], '系統儲值')?></td-->
                <td><?=$var['amount']?></td>
                <td><?=$this->iff($var['rechargeAmount']>0, $var['rechargeAmount'], '--')?></td>
                <td><?=$this->iff($var['bankName'], $var['bankName'], '--')?></td>
                <td><?=$this->iff($var['state'], '儲值成功', '<span style="color:#653809">正在處理</span>')?></td>
                <!--td><?=$this->iff($var['state'], date('m-d H:i:s', $var['actionTime']), '--')?></td>
                <td><?=$var['info']?></td-->
                        </tr>    
 <?php }else{ ?>
          
            <?php } ?>						
                            </tbody>
                        
                        </table>
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
