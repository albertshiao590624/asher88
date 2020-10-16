<?php $this->display('inc_daohang.php'); ?>
<link rel="stylesheet" type="text/css" href="/css/nsc/home/reset.css?v=1.16.11.6" />
<link rel="stylesheet" href="/css/nsc/dzyh.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/huodong.css?v=1.16.11.6" />
<script>
function indexdzyh(err, data){
	if(err){
		$.alert(err);
	}else{
		reloadMemberInfo();
		$.alert(data);
	}
}
function indexdzyhed(err, data){
	if(err){
		$.alert(err);
		$("#vcode").trigger("click");
	}else{
		window.parent.reloadMemberInfo();
		$.alert(data);
		reload();
	}
} 
function indexdzyhtked(err, data){
	if(err){
		$.alert(err);
		$("#vcode").trigger("click");
	}else{
		window.parent.reloadMemberInfo();
		$.alert(data);
		reload();
	}
}
</script>

        <div id="contentBox" class="activity_main">
            <div class="right_meun" id="siderbar">
                <div class="r_tit-bg"><h3 class="r_tit">热门活动</h3></div>
                <ul>
			        	
						<!--<li >
			                <a href="/index.php/score/rotate">幸运大转盘</a>
			            </li>
						<li >
			                <a href="/index.php/score/zadan">幸运砸蛋</a>
			            </li>
						
						<li >
			                <a href="/index.php/score/goods/current">积分兑换</a>
			            </li>
						<li >
			                <a href="/index.php/event/index">儲值福利</a>
			            </li>
						<li >
			                <a href="/index.php/score/yongjin">新至尊佣金活动</a>
			            </li>
			            <li >
			                <a href="/index.php/score/chuangguan">VIP返利活动</a>
			            </li>-->
						<li class="current">
			                <a href="/index.php/score/dodzyh">投资理财</a>
			            </li>
						<li class="current">
			                <a href="/index.php/score/ffsy">分红收益</a>
			            </li>
						<li class="current">
			                <a href="/index.php/score/tdsy">团队收益</a>
			            </li>
						<li class="current">
			                <a href="/index.php/score/tkmx">提款明细</a>
			            </li>
						<li class="current">
			                <a href="/index.php/score/ckmx">存款明细</a>
			            </li>
			    </ul>
            </div>
    <div class="left_activity">
<div class="activity_banner" style="background:url(/images/nsc/activity/touzhi.jpg) no-repeat center top;"></div>
  <?php
	

	$sql="select * from {$this->prename}dzyhtk where uid={$this->user['uid']} order by add_time desc";

	
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	$params=http_build_query($_GET, '', '&');
	//print_r($data);

?>
<div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="grayTable">
	<thead>
		<tr class="table_b_th">
			<td>单号</td>
			<td>提款时间</td>
			<td>存款时间</td>
			<td>本金</td>
			<td>收益</td>
			<td>类型</td>
			<td>手续费</td>
			<td>状态</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data['data']){foreach($data['data'] as $var){ ?>
		<tr>
			<td>
				<?=$var['pid']?>
			</td>
            <td>
			<?=date("Y-m-d H:i:s",$var['add_time'])?>
            </td>
			<td><?=date("Y-m-d H:i:s",$var['ck_time'])?></td>
			<td><?=$var['money']?>元</td>
			<td><?=$var['lx']?>元</td>
			<td><?=$var['info']?></td>
			<td><?=$var['sxf']?>元</td>
		
			<td>
			<?php
				if($var['status']==0){
					echo '<font color="red">审核中</font>';
				}else if($var['status']==1){
					echo '成功';
				}else{
					echo '失败';
				}
			?>
			</td>
          
		</tr>
	<?php } }else{ ?>
    <tr><td colspan="12">暂无信息</td></tr>
    <?php } ?>
	</tbody>
</table>
<?php 
	$this->display('inc_page.php',0,$data['total'],$this->pageSize, "/index.php/{$this->controller}/{$this->action}-{page}/?$params");
?>
</div>
<?php $this->display('inc_che2.php'); ?>

</div>
	

</body>
</html>
