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
<?php $this->display('inc_skin.php'); ?>
<header class="header">
	<!-- <a href="/index.php"><img class="logo" src="/images/nsc_m/index/logo.png?v=1.16.11.16"></a> -->
	<a class="m-return" onclick="checkbackspace();">返回</a>
	<span class="btn-slide-bar"></span>
	<div class="wercom">歡迎您,<b class="username"> aa123</b>
	<a href="/?controller=user&amp;action=main&amp;tag=messages" class="ui_message">
          <!--      <i></i> -->
               <i class="ui_msgnum" style="display:none">0</i>
           </a> </div>
	<!-- <h1 class="page-title">header</h1> -->
</header>

	<input type="hidden" value="<?=$args[2]?>" id='index'>
	<input type="hidden" value="<?=$args[3]?>" id='msg'>
	<!-- <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> -->
</nav>

<div class="page-container">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				
				<!-- <span >额度记录</span> -->
				<!-- <span>线上存款</span>
				<span>线上取款</span> 
				<span>AG记录</span>
				<span>MG记录</span>
				<span>PT记录</span>
				<span>申博记录</span>
				-->
				
				<span>BBIN记录</span>
			</div>

			<!-- AG -->
			<div class="tabCon">
	<form method="post" action="/lives/getBetList" id="AG">
	<div class="text-c"> 日期范围：
		<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="hidden" name="type" value="ag">
		<button type="submit" class="btn btn-success" id="" name="" style="background-color:#9a0636;border-color:#9a0636;"><i class="Hui-iconfont">&#xe665;</i> 查询</button>
	</div>
	</form>

	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">单号</th>
					<th width="80">下注时间</th>
					<th width="80">游戏</th>
					<th width="80">桌号</th>
					<th width="80">投注金额</th>
					<th width="80">有效投注金额</th>
					<th width="80">派彩</th>
				</tr>
			</thead>


			<tbody>
		
			<?php if($args[1] == 'ag'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=$value['betOrderNo']?></td>
					<td><?=$value['transactionTime']?></td>
					<td><?=$value['gameCode']?></td>
					<td><?=$value['room']?></td>
					<td><?=$value['betAmount']?></td>
					<td><?=$value['validBetAmount']?></td>
					<?php if($value['netPnl']>0){?>
					<td style="color: #B92924;"><?=$value['netPnl'].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$value['netPnl'].''?></td>
					<?php } ?>
				</tr>
				<?php } ?>

				<tr class="text-c">
					<td>合计金额</td>
					<td></td>
					<td></td>
					<td></td>
					<td style="color: #B92924;"><?=$args[4].''?></td>
					<td style="color: #B92924;"><?=$args[5].''?></td>
					<?php if($$args[6]>0){?>
					<td style="color: #B92924;"><?=$args[6].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$args[6].''?></td>
					<?php } ?>
				</tr>
			<?php } ?>
			</tbody>



		</table>


	</div>

			</div>


		
<!-- MG -->
			
<div class="tabCon">
	<form method="POST" action="/lives/getBetList" id="MG">
		<div class="text-c"> 日期范围：
		<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="hidden" name="type" value="mg">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
		</div>
	</form>
<div class="mt-20">
	
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="80">单号</th>
					<th width="80">下注时间</th>
					<th width="80">游戏</th>
					<th width="80">桌号</th>
					<th width="80">投注金额</th>
					<th width="80">有效投注金额</th>
					<th width="80">派彩</th>
				</tr>
			</thead>


			<tbody>
		<?php if($args[1] == 'mg'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=$value['colId']?></td>
					<td><?=$value['BetTime']?></td>
					<td><?=$value['mgsActionId']?></td>
					<td><?=$value['mgsGameId']?></td>
					<td><?=number_format($value['amnt'],2)?></td>
					<td><?=number_format($value['amnt'],2)?></td>
					<?php if($value['Win'] > 0){?>
					<td style="color: #B92924;"><?=$value['Win'].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;">-<?=number_format($value['amnt'],2).''?></td>
					<?php } ?>
				</tr>

				<?php } ?>
				<tr class="text-c">
					<td>合计金额</td>
					<td></td>
					<td></td>
					<td></td>
					<td style="color: #B92924;"><?=$args[4].''?></td>
					<td style="color: #B92924;"><?=$args[5].''?></td>
					<?php if($$args[6]>0){?>
					<td style="color: #B92924;"><?=$args[6].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$args[6].''?></td>
					<?php } ?>
				</tr>

			<?php } ?>

			</tbody>



		</table>


		</div>
			</div>

<!-- BBIB -->
			<div class="tabCon">
				<form method="post" action="" id="BB">
				<div class="text-c"> 日期范围：
					<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
					-
					<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
					<input type="hidden" name="type" value="bb">
					<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
				</div>
				</form>

				<div class="mt-20">
					<table class="table table-border table-bordered table-hover table-bg table-sort">
						<thead>
				<tr class="text-c">
					<th width="80">单号</th>
					<th width="80">下注时间</th>
					<!-- <th width="80">游戏</th> -->
					<th width="80">桌号</th>
					<th width="80">投注金额</th>
					<th width="80">有效投注金额</th>
					<th width="80">派彩</th>
				</tr>
			</thead>


			<tbody>
		<?php if($args[1] == 'bb'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=$value['WagersID']?></td>
					<td><?=$value['WagersDate']?></td>
					<!-- <td><?=$value['GameType']?></td> -->
					<td><?=$value['GameCode']?></td>
					<td><?=number_format($value['BetAmount'],2)?></td>
					<td><?=number_format($value['Commissionable'],2)?></td>
					<?php if($value['Payoff'] > 0){?>
					<td style="color: #B92924;"><?=$value['Payoff'].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=number_format($value['Payoff'],2).''?></td>
					<?php } ?>
				</tr>

				<?php }?>
					<tr class="text-c">
					<td>合计金额</td>
					<td></td>
					<td></td>
					<td style="color: #B92924;"><?=$args[4].''?></td>
					<td style="color: #B92924;"><?=$args[5].''?></td>
					<?php if($$args[6]>0){?>
					<td style="color: #B92924;"><?=$args[6].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$args[6].''?></td>
					<?php } ?>
				</tr>
				<?php }?>

			</tbody>



		</table>


		</div>
			</div>

<!-- PT -->
<div class="tabCon">
				<form method="post" action="/lives/getBetList" id="PT">
				<div class="text-c"> 日期范围：
					<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
					-
					<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
					<input type="hidden" name="type" value="pt">
					<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
				</div>
				</form>

				<div class="mt-20">
					<table class="table table-border table-bordered table-hover table-bg table-sort">
						<thead>
							<tr class="text-c">
								<th width="80">单号</th>
								<th width="80">下注时间</th>
								<!-- <th width="80">游戏</th> -->
								<th width="80">桌号</th>
								<th width="80">投注金额</th>
								<th width="80">有效投注金额</th>
								<th width="80">派彩</th>
							</tr>
						</thead>


						<tbody>
		<?php if($args[1] == 'pt'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=$value['GAMECODE']?></td>
					<td><?=$value['GAMEDATE']?></td>
					<!-- <td><?=$value['GameType']?></td> -->
					<td><?=$value['GAMETYPE']?></td>
					<td><?=number_format($value['BET'],2)?></td>
					<td><?=number_format($value['BET'],2)?></td>
					<?php if($value['WIN'] > 0){?>
					<td style="color: #B92924;"><?=$value['WIN'].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;">-<?=number_format($value['BET'],2).''?></td>
					<?php } ?>
				</tr>


				<?php } ?>
					<tr class="text-c">
					<td>合计金额</td>
					<td></td>
					<td></td>
					<td style="color: #B92924;"><?=$args[4].''?></td>
					<td style="color: #B92924;"><?=$args[5].''?></td>
					<?php if($$args[6]>0){?>
					<td style="color: #B92924;"><?=$args[6].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$args[6].''?></td>
					<?php } ?>
				</tr>

				<?php  }?>

			</tbody>



		</table>


		</div>
			</div>

<!-- SunBet -->
		<div class="tabCon">
				<form method="post" action="/lives/getBetList" id="SunBet">
				<div class="text-c"> 日期范围：
					<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
					-
					<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
					<input type="hidden" name="type" value="sun">
					<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
				</div>
				</form>

				<div class="mt-20">
					<table class="table table-border table-bordered table-hover table-bg table-sort">
						<thead>
							<tr class="text-c">
								<th width="80">单号</th>
								<th width="80">下注时间</th>
								<!-- <th width="80">游戏</th> -->
								<th width="80">游戏</th>
								<th width="80">投注金额</th>
								<th width="80">有效投注金额</th
>								<th width="80">派彩</th>
							</tr>
						</thead>


						<tbody>
			<?php if($args[1] == 'sun'){  ?>
				<?php foreach ($args[0] as $key => $value) {?>
				<tr class="text-c">
					<td><?=$value['record_id']?></td>
					<td><?=$value['time']?></td>
					<!-- <td><?=$value['GameType']?></td> -->
					<td><?=$value['game_id']?></td>
					<td><?=number_format($value['bet'],2)?></td>
					<td><?=number_format($value['bet'],2)?></td>
					<?php if($value['win'] > 0){?>
					<td style="color: #B92924;"><?=$value['win'].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;">-<?=number_format($value['bet'],2).''?></td>
					<?php } ?>
				</tr>


				<?php } ?>
				<tr class="text-c">
					<td>合计金额</td>
					<td></td>
					<td></td>
					<td style="color: #B92924;"><?=$args[4].''?></td>
					<td style="color: #B92924;"><?=$args[5].''?></td>
					<?php if($$args[6]>0){?>
					<td style="color: #B92924;"><?=$args[6].''?></td>
					<?php }else{ ?>
					<td style="color: #01D867;"><?=$args[6].''?></td>
					<?php } ?>
				</tr>
				
				<?php }?>

			</tbody>



		</table>


		</div>
			</div>



			</div>


		</div>
		<!-- <div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div> -->
	</form>
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
