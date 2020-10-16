<?php $this->display('inc_daohang1.php'); ?>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>

<section class="wraper-page">
<div class="ibox-title">
 <h5>存款列表 <small></small></h5>
                        
</div>
 <style>
	.col-sm-12{padding:0px;}
	.col-sm-12 td{padding:0 !important; font-size:12px;}
	label{width:40%;}
 </style>
<div class="display biao-cont">
    	<!--下注列表-->
<?php
	$sql="select * from {$this->prename}dzyh_ck_swap where uid={$this->user['uid']} order by time desc";
	
	$data=$this->getPage($sql, $this->page, $this->pageSize);

	$params=http_build_query($_GET, '', '&');
	//echo $params;
?>

                 
                    <div class="ibox-content">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>单号</th>
									<th>存款时间</th>
									<th>本金</th>
									<th>可提收益</th>
									<th>状态</th>
									<th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
						<?php if($data['data']) foreach($data['data'] as $var){ ?>
	
                                <tr class="gradeX">
                                    <td>
										<?=$var['id']?>
									</td>
									<td><?=date("Y-m-d H:i:s",$var['time'])?></td>
									<td><?=$var['ck_money']?>元</td>
									<td><?=$var['ljsy']?>元</td>
								
									<td>
									<?php
										if($var['state']==0){
											echo '<font color="red">正常</font>';
										}else{
											echo '<font color="red">已出局</font>';
										}
									?>
									</td>
								
									<td>
									
										<a href="/index.php/score/dzyhtk_bj?id=<?=$var['id']?>" style="color:#333;" target="modal"  width="80%" title="提款本金" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">提款本金</a> ——<br/>
										<a href="/index.php/score/dzyhtk_sy?id=<?=$var['id']?>" style="color:#333;" target="modal"  width="80%" title="提款收益" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">提款收益</a> ——<br/>
										<a href="/index.php/score/ffsy">收益明细</a>
										
									</td>
						</tr>
						<?php }?>

                                
                            </tbody>
                        
                        </table>

                    </div>
           
  
   <script>
    $(document).ready(function() {
              $('.dataTables-example').dataTable( {
              //跟数组下标一样，第一列从0开始，这里表格初始化时，第四列默认降序
                "order": [[ 1, "desc" ]]
              } );
            } );
       
    </script>
</body>
</html>
        <!--下注列表 end -->
</div>
