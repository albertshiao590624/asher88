<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>额度转换记录</title>

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
<div class="page-container">
	<form method="get" action="">
	<div class="text-c"> 日期范围：
		<input type="text" name='time1' onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name='time2' onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<button type="submit" class="btn btn-success" id="" name="" style="background-color:#9a0636;border-color:#9a0636;"><i class="Hui-iconfont">&#xe665;</i> 查询</button>
	</div>
	<form>

	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25">单号</th>
					<th width="80">操作</th>
					<th width="100">金额</th>
					<th width="90">操作前金额</th>
					<th width="130">操作后金额</th>
					<th>时间</th>
				</tr>
			</thead>


			<tbody>
		<!-- <?php print_r($args[0])?> -->

				<?php foreach ($args[0] as $key => $value) {?>

				<tr class="text-c">
					<td><?=$value['order_num']?></td>
					<td><?=$value['about']?></td>
					<td style="color: red;"><?=$value['order_value'].''?></td>
					<td><?=$value['assets']?></td>
					<td><?=$value['balance']?></td>
					<td><?=$value['update_time']?></td>
					
				</tr>

				<?php } ?>

			</tbody>



		</table>


	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/HUI/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/HUI/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/HUI/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/HUI/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/HUI/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript">
// $('.table-sort').dataTable({
// 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
// 	"bStateSave": true,//状态保存
// 	"aoColumnDefs": [
// 	  {"bVisible": false, "aTargets": [ 2 ]}, //控制列的隐藏显示
// 	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
// 	]
// });

/*用户-删除*/

</script>
</body>
</html>