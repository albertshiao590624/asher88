<?php $this->display('inc_daohang1.php'); ?>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>

<section class="wraper-page">
<style>
		.col-sm-12 td{font-size:12px;}
        .sel_btn{
            height: 35px;
            line-height: 21px;
            padding: 0 11px;
            background: #02bafa;
            border: 1px #26bbdb solid;
            border-radius: 3px;
            /*color: #fff;*/
            display: inline-block;
            text-decoration: none;
            font-size: 24px;
            outline: none;
			width:150px;
			text-align:center;
        }
        .ch_cls{
            background: #e4e4e4;
        }
    </style> 

   
   <a href="/index.php/score/ffsy" style="margin-top: 20px;
    margin-left: 19%;
    width: 30%;
    font-size: 18px;
    line-height: 35px;
    height: 35px; background-color:#9a0636; color:#fff; border:none" class="sel_btn ch_cls">分红明细</a> 

	<a href="/index.php/score/tdsy" style="margin-top: 20px;
    margin-left: 7%;
    width: 30%;
    font-size: 18px;
    line-height: 35px;
    height: 35px;color: #fff; border:none" class="sel_btn">团队明细</a>
<div class="ibox-title">
 <h5>团队收益明细 <small></small></h5>
                        
</div>
  
<div class="display biao-cont">
    	<!--下注列表-->
<?php
	$start_time = mktime(0,0,0,date('m'),date('d')-2,date('Y'));
	$over_time = strtotime(date("Y-m-d 23:59:59",time()));


	$sql="select * from {$this->prename}mesxjfh where uids={$this->user['uid']} and add_time >= {$start_time} and add_time <= {$over_time} order by add_time desc";

	
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	$params=http_build_query($_GET, '', '&');
	//print_r($data);
?>

                 
                    <div class="ibox-content" style=" width:100%; overflow-x:auto">

                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <td>单号</td>
									<td>下级会员</td>
									<td>分红时间</td>
									<td>下级投资本金</td>
									<td>下级今日收益</td>
									<td>下级利率</td>
									<td>获得收益</td>
									<td>状态</td>
                                </tr>
                            </thead>
                            <tbody>
						<?php if($data['data']) foreach($data['data'] as $var){ ?>
	
                                <tr class="gradeX">
                                    <td>
										<?=$var['did']?>
									</td>
									<td>
									<?
									if($var['user_name']){echo  $var['user_name'];}else{echo '--';};
									?>
									</td>
									<td><?=date("Y-m-d H:i:s",$var['add_time'])?></td>
									<td><?=$var['money']?>元</td>
									<td><?=$var['jrzsfh']?>元</td>
									<td><?=$var['xjbili']?>%</td>
									<td><?=$var['jrfsfh']?>元</td>
								
									<td>
									<?php
										if($var['status']==0){
											echo '<font color="red">成功</font>';
										}else{
											echo '失败';
										}
									?>
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
