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

	<input type="hidden" value="<?=$args[0]['index']?>" id='index'>
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">

	<form class="form form-horizontal" id="form-article-add">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>额度转换</span>
				<!-- <span >额度记录</span> -->
				<!-- <span>线上存款</span>
				<span>线上取款</span> 
				<span>修改密码</span>
				<span>修改取款密码</span>-->
			</div>
			<div class="tabCon">
				<table class="table table-border table-bordered radius" height='100px'>
					
					<tr class="btntitle">
						<td>体育/彩票账户</td>
						<td>余额</td>
						<td>操作</td>
					</tr>

					<tr>
						<td>
							主账户
						</td>
						<td>
							<span style="color: red;" ><?=$args[0]['coin'].?></span>
						</td>
						<td>
							系统余额不需要额度转换
						</td>
					</tr>


					<!--tr>
						<td>
							AG
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'AG')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('AG')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('AG')" value='转出' type="button" />
						</td>
					</tr>


					

					
					<tr>
						<td>
							MG
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'MG')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('MG')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('MG')" value='转出' type="button" />
						</td>
					</tr>

					
					<tr>
						<td>
							PT
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'PT')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('PT')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('PT')" value='转出' type="button" />
						</td>
					</tr>

					
					<tr>
						<td>
							申博
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'SunBet')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('SunBet')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('SunBet')" value='转出' type="button" />
						</td>
					</tr>

					<tr>
						<td>
							开元棋牌
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'KY')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('KY')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('KY')" value='转出' type="button" />
						</td>
					</tr-->
					<tr>
						<td>
							BBIN
						</td>
						<td>
							<input class='btn btn-primary radius' onclick="zzamount($(this),'BB')" value='点击显示' type="button"  />
						</td>
						<td>
							<input class='btn btn-success radius' onclick="zamount('BB')" value='转入' type="button" />
							<input class='btn btn-danger radius' onclick="pamount('BB')" value='转出' type="button" />
						</td>
					</tr>
				
				</table>

			</div>


		

			
			<div class="tabCon">
				<table class="table">
					<tr>
						<td class="text-r">登录密码</td>
						<td width="600"><input type="password" class="input-text radius width400" id="oldpass" ></td>
					</tr>
					<tr>
						<td  class="text-r">新密码</td>
						<td><input type="password" class="input-text radius width400" id="newpass"></td>
					</tr>
					<tr>
						<td class="text-c" colspan="2">
							<input class='btn btn-primary radius' onclick="setpass()" value='修改' type="button" />
						</td>
					</tr>
				</table>
			</div>


			<div class="tabCon">
				<table class="table">
					<tr>
						<td class="text-r">登录密码</td>
						<td width="600"><input type="password" class="input-text radius width400" id="password" ></td>
					</tr>
					
					<tr>
						<td  class="text-r">新提款密码</td>
						<td><input type="newcoin" class="input-text radius width400" id="newcoinpass"></td>
					</tr>
					<tr>
						<td class="text-c" colspan="2">
							<input class='btn btn-primary radius' onclick="setcoinpass()" value='修改' type="button" />
						</td>
					</tr>
				</table>
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
	
	var index = $('#index').val();
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '50%'
	});
	$("#tab-system").Huitab({
		index:index
	});
});
</script>
 <script src="/QQ2617674/js/function.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
