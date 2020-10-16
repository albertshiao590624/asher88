<?php $this->display('inc_daohang1.php'); ?>
<link rel="stylesheet" href="/css/nsc_m/list.css?v=1.16.11.16">
<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/newskin/js/common.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>


<style>
	.centerbox{width:80%; height:90px; background:#fff; position:relative; border-radius: 15px;     box-shadow: #c1bfbf 0px 3px 7px; margin: 0 auto; bottom:30px;}
	.centerbox .left{text-align:center; float:left; width:50%;  height:100%; display:block; text-decoration:none;}
	.centerbox .left:after{content:''; display:block; position:absolute; width:1px; height:40px; top:25px; background:#d4d4d4; left:calc(50% - 1px);}
	.centerbox .right{text-align:center; float:right; width:50%;  height:100%; display:block; text-decoration:none;}
	.centerbox  .titles{font-size:14px; margin-top:15px;}
	.centerbox  .money{font-size:22px; color:#f9870e;}
	.menus a{width:33%; text-align:center; float:left; display:block; text-decoration:none; margin-bottom:15px;}
	.menus a img{width:50%;}
	.menus a .titles{color:#7b7575;}
</style>
<section class="wraper-page">

<img src='/images/faxian/banner.jpg' width='100%' />

<div class='centerbox' >
	<a href="/index.php/score/ckmx" class='left'>
		<div class='titles'>理財餘額(即將上線)</div>
		<div class='money'> <?=$args[0]['money']?></div>
	</a>
	<a href="/index.php/score/ckmx" class='right'>
		<div class='titles'>理財收益(即將上線)</div>
		<div class='money'> <?=$args[0]['zmoney']?></div>
	</a>
</div>
<div class='menus'>
	<a href="#" class="dj">
		<img src='/images/faxian/1_03.png'/>
		<div class='titles'>購彩策略(即將上線)</div>
	</a>
	<a href="#" class="dj">
		<img src='/images/faxian/2_05.png'/>
		<div class='titles'>商城所(即將上線)</div>
	</a>
	<a href="#" class="dj">
		<img src='/images/faxian/3_07.png'/>
		<div class='titles'>交易所(即將上線)</div>
	</a>
	<a href="#" class="dj">
		<img src='/images/faxian/4_12.png'/>
		<div class='titles'>福利視頻(即將上線)</div>
	</a>
</div>
<script>
$(".dj").click(function(){
	
	alert('敬請期待');
	
});
</script>
</section> 
</body>


</html>
