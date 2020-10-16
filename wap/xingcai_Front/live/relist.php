<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/HUI/lib/html5shiv.js"></script>
<script type="text/javascript" src="/HUI/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/HUI/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/HUI/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/HUI/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/HUI/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/HUI/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/HUI/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->
<style type="text/css">
	.btntitle{
		background: #E3F6FD;
	}
	.width400{
		width: 400px;
	}
</style>
<!-- <title>基本设置</title> -->
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i><?=$this->settings['webName']?>

	<input type="hidden" value="<?=$args[2]?>" id='index'>
	<!-- <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> -->
</nav>

<div class="page-container">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>儲值记录</span>
				<!-- <span >额度记录</span> -->
				<!-- <span>线上存款</span>
				<span>线上取款</span> -->
				<span>提现记录</span>
			</div>

			<!-- AG -->
			<div class="tabCon">
	<form method="post" action="/center/recharge" id="AG">
	<div class="text-c"> 日期范围：
		<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="hidden" name="type" value="cz">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
	</div>
	</form>

	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">时间</th>
					<th width="80">单号</th>
					<th width="80">儲值方式</th>
					<th width="80">金额</th>
					<th width="80">状态</th>
				</tr>
			</thead>


			<tbody>
		
			<?php if($args[1] == 'cz'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=date('Y-m-d H:i:s',$value['actionTime'])?></td>
					<td><?=$value['rechargeId']?></td>
					<td><?=$value['info']?></td>
					<td><?=$value['amount']?></td>
					<?php if($value['state'] == 0){?>
					<td>申请中</td>
				<?php }else if($value['state'] == 1 ||$value['state'] == 2 ||$value['state'] == 9){?>
					<td>已到账</td>

				<?php }else if($value['state'] == 3){?>
					<td>儲值失败</td>
				<?php } ?>
				</tr>
				<?php } ?>

			<?php } ?>
			</tbody>
		</table>


	</div>

			</div>


		
<!-- MG -->
			
<div class="tabCon">
	<form method="POST" action="/center/recharge" id="MG">
		<div class="text-c"> 日期范围：
		<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="hidden" name="type" value="tx">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
		</div>
	</form>
<div class="mt-20">
	
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					
					<th width="80">时间</th>
					<th width="80">交易类型</th>
					<th width="80">金额</th>
					<th width="80">卡号</th>
					<th width="80">反馈</th>
					<th width="80">状态</th>
				</tr>
			</thead>


			<tbody>
		<?php if($args[1] == 'tx'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=date('Y-m-d H:i:s',$value['actionTime'])?></td>
					<td>提现</td>
					<td><?=$value['amount']?></td>
					<td><?=$value['account']?></td>
					<td style="color: #B92924;"><?=$value['info']?></td>
					<?php if($value['state'] == 1){?>
					<td style="color: #B92924;">申请中...</td>
					<?php }else if($value['state'] == 2 || $value['state'] == 4 ||$value['state'] == 5){ ?>
					<td style="color: #01D867;">已取消</td>
					<?php }else{ ?>
					<td style="color: #01D867;">已到账</td>
					<?php } ?>



				</tr>

				<?php } ?>
			<?php } ?>

			</tbody>



		</table>


		</div>
			</div>






			</div>


		</div>
	</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/HUI/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/HUI/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/HUI/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/HUI/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/HUI/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/HUI/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/HUI/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
	
$(function(){

	var msg   = $('#msg').val();
	var index = $('#index').val();
	if(msg){
		alert(msg);
	}
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '50%'
	});
	$("#tab-system").Huitab({
		index:index
	});
});
console.log($('#MG'));
</script>
 <script src="/QQ2617674/js/function.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
