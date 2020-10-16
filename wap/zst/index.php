<?php
ob_start('ob_output');
function ob_output($html) {
	// 一些帳號喜歡使用windows筆記本編輯檔，因此在輸出時需要檢查是否包含BOM頭
	if (ord(substr($html, 0, 1)) === 239 && ord(substr($html, 1, 2)) === 187 && ord(substr($html, 2, 1)) === 191) $html = substr($html, 3);
	// gzip輸出
	if(
		!headers_sent() && // 如果頁面頭部資訊還沒有輸出
		extension_loaded("zlib") && // 而且zlib擴展已經載入到PHP中
		array_key_exists('HTTP_ACCEPT_ENCODING', $_SERVER) &&
		stripos($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip") !== false // 而且流覽器說它可以接受GZIP的頁面 
	) {
		$html = gzencode($html, 3);
		header('Content-Encoding: gzip'); 
		header('Vary: Accept-Encoding');
	}
	header('Content-Length: '.strlen($html));
	return $html;
}
require('../xingcai_config.php');
$id=array('1','5','12','14','26','60','61','62','75','76');
$pgsid=array('30','50','80','100','120','200','300','');
include(dirname(__FILE__)."/inc/comfunc.php");
//此處設置彩種id
$typeid=intval($_GET['typeid']);
if(!in_array($typeid,$id)) die("typeid error");
if(!$typeid) $typeid=14;
//每頁預設顯示
$pgs=intval($_GET['pgs']);
if(!in_array($pgs,$pgsid)) die("pgs error");
if(!$pgs) $pgs=30;
//當前頁面
$page=intval($_GET['page']);
if(!$page) $page=1;
//傳參
$toUrl="?page=";
$params=http_build_query($_REQUEST, '', '&');
if(!$mydb) $mydb = new MYSQL($dbconf);
$gRs = $mydb->row($conf['db']['prename']."type","shortName","id=".$typeid);
if($gRs){
	$shortName=$gRs[0][0];
}

$fromTime=$_GET['fromTime'];
$toTime=$_GET['toTime'];
?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun="" style="font-size: 15.525px;"><head>
<title>阿舍仔娛樂城-官方網站</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
<meta http-equiv="Pragma" content="no-cache">
<link rel="stylesheet" href="/css/nsc_m/list.css?v=1.17.2.1">
<link rel="stylesheet" href="css/line.css" type="text/css">
<link rel="stylesheet" href="/css/nsc_m/res.css?v=1.17.2.1">
<link href="/css/nsc_m/m-lottery.css?v=1.17.2.1" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.17.2.1"></script>
<script language="javascript" type="text/javascript" src="js/line.js"></script>


<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.17.2.1"></script><link href="/js/nsc_m/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
 <script type="text/javascript" src="/js/nsc/common.js?v=1.17.2.1"></script>
<link rel="stylesheet" href="/js/common/calendar/css/calendar-blue.css?v=1.17.2.1" type="text/css">
<style type="text/css">

html {overflow:-moz-scrollbars-vertical; overflow-y:scroll;}
</style>

<script type="text/javascript"> 
  $(function(){
    //切換漏號分析
      $('.lhfx_tit').click(function(e){
      $('.lhfx_lotterylist').toggle();
      $(document).on('click',function(){
        $('.lhfx_lotterylist').hide();
      });
      e.stopPropagation();

  });
  $('.lhfx_lotterylist').on('click',function(e){
    e.stopPropagation();
  });
})
  </script>

</head>
<body>
<div id="body">
<header class="header">
  <a class="m-return" href="javascript:window.history.back(-1);">返回</a>
  <div class="lhfx_tit"><span class="showAll"><?=$shortName?>--歷史開獎</span></div>
  <span class="btn-slide-bar"></span>
  <!-- <h1 class="page-title">header</h1> -->
</header>
<!--側導航 -->
    <section class="slide-bar">
      <ul class="tree">
        <li class="tree_list"><h3 class="one_nav_list home"><a href="/?index.php">首頁</a></h3>
          <div class="m_nav_line"></div>
        </li>
		<li class="tree_list">
	                <h3 class="one_nav_list uc_icon_r"><a href="/index.php/safe/Personal">帳號中心</a></h3>
	                <div class="m_nav_line"></div>
				</li>
        <li class="tree_box tree_list">
          <h3 class="one_nav_list  game_icon tree_box">彩票遊戲<i class="lnstruction-top"></i></h3>
          <ul class="tree_one" style="display:block">
            <li class="lotter_list_game">
            <div class="m_nav_line"></div>
              <dl>
              <!--<dt>高頻彩</dt>
								<dd>-->
									<ul class="lot_list">
									<!--	<li><a href="/index.php/index/game/1/2/12">重慶時時彩</a> </li>
										<li><a href="/index.php/index/game/12/2/12">新疆時時彩</a> </li>
										<li><a href="/index.php/index/game/60/2/12">天津時時彩</a> </li>
										<li><a href="/index.php/index/game/61/59/193">澳門時時彩<i>H</i></a> </li>
										<li><a href="/index.php/index/game/62/59/193">臺灣時時彩<i>H</i></a> </li>
										<li><a href="/index.php/index/game/5/59/193">騰訊分分彩<i>H</i></a> </li>
										<li><a href="/index.php/index/game/26/59/193">東京2分彩<i>H</i></a> </li>
										<li><a href="/index.php/index/game/14/59/193">騰訊5分彩<i>H</i></a></li>
										<li><a href="/index.php/index/game/76/59/193">韓國1.5分彩<i>H</i></a></li>
										<li><a href="/index.php/index/game/75/59/193">巴西快樂彩<i>H</i></a></li>-->
										<li><a class="xg_6hc" href="/index.php/index/game/34">台灣今彩539</a></li>
										<!-- comingsoon();  如果需要禁用用這個函數即可 
									</ul>
								</dd>
							</dl>
							<dl>
							<dt>PK拾</dt>
								<dd>
									<ul class="lot_list">
									<!--	<li><a href="/index.php/index/game/20">北京PK拾</a> </li>
										<li><a href="/index.php/index/game/55">幸運飛艇</a> </li>
										<li><a href="/index.php/index/game/80">SG飛艇</a> </li>
										<!--<li><a href="/index.php/index/game/65">澳門PK拾<i class="m-yellow">N</i></a> </li>
										<li><a href="/index.php/index/game/66">臺灣PK拾<i class="m-yellow">N</i></a> </li>-->
									</ul>
								</dd>
							</dl>
							<dl>
							<dt>快3</dt>
								<dd>
								<!--	<ul class="lot_list">
										<li><a href="/index.php/index/game/79">江蘇快三<i>H</i></a></li>
										<!--<li><a href="/index.php/index/game/63">澳門快三</a></li>
										<li><a href="/index.php/index/game/64">臺灣快三</a></li>-->
									</ul>
								</dd>
							<!--</dl>-->
							<!--<dl>
							<dt>11選5</dt>
								<dd>
									<ul class="lot_list">
										<li><a href="/index.php/index/game/6">廣東11選5<i>H</i></a></li>
										<!--li><a href="/index.php/index/game/16">江西11選5</a></li-->
										<!--li><a href="/index.php/index/game/7">山東11選5</a></li--
										<li><a href="/index.php/index/game/15">上海11選5</a></li>
										<!--li><a href="/index.php/index/game/67">澳門11選5<i>H</i></a></li--
										<li><a href="/index.php/index/game/68">臺灣11選5<i>H</i></a></li>
									</ul>
								</dd>
							</dl>
							<dl>
							<dt>快樂8</dt>
								<dd>
									<ul class="lot_list">
										<li><a href="/index.php/index/game/78">北京快樂8</a> </li>
										<!--<li><a href="/index.php/index/game/74">韓國快樂8<i>H</i></a></li>
										<li><a href="/index.php/index/game/73">澳門快樂8</a></li>-->
									</ul>
								</dd>
							<!--</dl>-->
							<!--dl>
								<dt>3D-排列3</dt>
								<dd>
									<ul class="lot_list">
										<li><a href="/index.php/index/game/9">福彩3D</a> </li>
										<!--<li><a href="/index.php/index/game/69">澳門3D</a></li>
										<li><a href="/index.php/index/game/70">臺灣3D</a></li>>
										<li><a href="/index.php/index/game/10">排列3</a></li>
									</ul>
								</dd>-->
							<!--</dl>-->
						</li> 
					</ul>
					<div class="m_nav_line"></div>
        </li>
        <li class="tree_box tree_list">
					<h3 class="one_nav_list account_icon">帳戶管理<i class="lnstruction-top"></i></h3>
					<ul class="tree_one">
						<li class="lotter_list_game">
							<div class="m_nav_line"></div>
								<dl class="lnstruction">
									<dd>
										<ul class="lot_list">
											<li class="tree_list"> <a href="/index.php/record/search">投注記錄</a></li>
											<li class="tree_list"> <a href="/index.php/report/coin">帳變記錄</a></li>
											<li class="tree_list"> <a href="/index.php/report/count">盈虧報表</a></li>
											<li class="tree_list"><a href="/index.php/safe/info">綁定卡號 </a></li>
											<li class="tree_list"><a href="/index.php/safe/loginpasswd">登入密碼</a></li>
											<li class="tree_list"><a href="/index.php/safe/passwd">提款密碼</a></li>
										</ul>
									</dd>
								</dl>
						</li>
					</ul>
					<div class="m_nav_line"></div>
				</li>
				<li class="tree_box tree_list">
					<h3 class="one_nav_list account_icon">儲值提現<i class="lnstruction-top"></i></h3>
					<ul class="tree_one">
						<li class="lotter_list_game">
							<div class="m_nav_line"></div>
								<dl class="lnstruction">
									<dd>
										<ul class="lot_list">
											<li class="tree_list"> <a href="/index.php/cash/recharge">儲值</a></li>
											<li class="tree_list"> <a href="/index.php/cash/toCash">提現</a></li>
											<li class="tree_list"> <a href="/index.php/cash/rechargeLog">儲值記錄</a></li>
											<li class="tree_list"><a href="/index.php/cash/toCashLog">提現記錄 </a></li>
										</ul>
									</dd>
								</dl>
						</li>
					</ul>
					<div class="m_nav_line"></div>
				</li>
				<li class="tree_box tree_list">
					<h3 class="one_nav_list activity_icon">優惠活動<i class="lnstruction-top"></i></h3>
					<ul class="tree_one">
						<li class="lotter_list_game">
							<div class="m_nav_line"></div>
								<dl class="lnstruction">
									<dd>
										<ul class="lot_list">
											<li class="tree_list"><a href="/index.php/score/lucky">幸運抽獎</a></li>
											<li class="tree_list"><a href="/index.php/cash/card">卡密儲值</a></li>
											<li class="tree_list"><a href="/index.php/lottery/hemai">合買中心</a></li>
											<li class="tree_list"><a class="notice" href="/index.php/notice/info">系統公告</a></li>
										</ul>
									</dd>
								</dl>
						</li>
					</ul>
					<div class="m_nav_line"></div>
				</li>			
			</ul>
		</section>
    <div class="home_b">
      <div class="m_nav_line"></div>
        <a class="one_nav_list conpt_icon" href="/?v=2">電腦版</a>
        <a class="one_nav_list retreat_icon" href="javascript:m_loginout()">安全退出</a>
    </div>
    <div class="shady"></div>
    <section class="wraper-page">
<div id="right_01">
<div class="right_01_01"></div>
</div>
<script language="javascript">
fw.onReady(function(){
	Chart.init();	
	DrawLine.bind("chartsTable","has_line");

		DrawLine.color('#499495');
	DrawLine.add((parseInt(0)*10+5+1),2,10,0);
		DrawLine.color('#E4A8A8');
	DrawLine.add((parseInt(1)*10+5+1),2,10,0);
		DrawLine.color('#499495');
	DrawLine.add((parseInt(2)*10+5+1),2,10,0);
		DrawLine.color('#E4A8A8');
	DrawLine.add((parseInt(3)*10+5+1),2,10,0);
		DrawLine.color('#499495');
	DrawLine.add((parseInt(4)*10+5+1),2,10,0);
		DrawLine.draw(Chart.ini.default_has_line);
	// if($("#chartsTable").width()>$('body').width())
	{
	   // $('body').width($("#chartsTable").width() + "px");
	}
	// $("#container").height($("#chartsTable").height() + "px");
	// $("#missedTable").width($("#chartsTable").width() + "px");
    resize();
	

	
	//最近多少期高亮
	var _num = "",_href;
	_href = window.location.href;
	_num = _href.match(/issuecount=(\d+)/);


});
function resize(){
    window.onresize = func;
    function func(){
        window.location.href=window.location.href;
    }
}
function daysBetween(start, end){
   var startY = start.substring(0, start.indexOf('-'));
   var startM = start.substring(start.indexOf('-')+1, start.lastIndexOf('-'));
   var startD = start.substring(start.lastIndexOf('-')+1, start.length);
  
   var endY = end.substring(0, end.indexOf('-'));
   var endM = end.substring(end.indexOf('-')+1, end.lastIndexOf('-'));
   var endD = end.substring(end.lastIndexOf('-')+1, end.length);
  
   var val = (Date.parse(endY+'/'+endM+'/'+endD)-Date.parse(startY+'/'+startM+'/'+startD))/86400000;
   return Math.abs(val);
}
function toggleMiss(){
    $('#missedTable').toggle();
}
</script>
<style>
	esun\:*{behavior:url(#default#VML)}
</style>

<div id="searchBox" style="background: #f8f8f8; padding:10px 0;">

    <div class="secondary_tabs">
        <ul>
            <li data="num_30" class="hover"><a href="?typeid=<?=$typeid?>&pgs=30" class="ml10<?php if($pgs==30) echo ' on'?>" target="_self">最近30期</a></li>
            <li data="num_50"><a href="?typeid=<?=$typeid?>&pgs=50" class="ml10<?php if($pgs==50) echo ' on'?>" target="_self">最近50期</a></li>
            <li data="num_100"><a href="?typeid=<?=$typeid?>&pgs=100" class="ml10<?php if($pgs==100) echo ' on'?>" target="_self">最近100期</a></li>
        </ul>
    </div>
    	<!-- <div class="lhfx_search_time">
		<form method="POST">
		<input type="hidden" name="controller" value="game">
		<input type="hidden" name="action" value="bonuscode">時間範圍：<input type="text" value="" name="starttime" id="starttime" class="time_input"><span class="image"></span><label>至</label><input type="text" value="" name="endtime" id="endtime" class="time_input">
		<span class="image"></span><input type="submit" value="查詢" id="showissue1" class="time_btn">
		</form>
	</div> -->
	<div class="clearfix"></div>
</div>

<div class="wo_choose" style="display:none"><span>標注形式選擇</span><input type="checkbox" name="checkbox2" value="checkbox" id="has_line" class="no_bk-bg"><label for="has_line">顯示走勢折線</label>
    <!--<input type="checkbox" name="checkbox" value="checkbox" id="no_miss" onclick="toggleMiss();" /><span><b><label for="no_miss">不帶遺漏資料</label></b></span>--></div>

<div style=" min-height:430px;" id="container">
	<table id="chartsTable" width="100%" cellpadding="0" cellspacing="0" border="0" style="display: table;">
    
       	       		<tbody>
		<tr id="title">
             <td style="width:38%;"><strong>期號</strong></td>
             <td colspan="5" class="redtext"><strong>開獎號碼</strong></td>
    	</tr>
		
		<?php
				if($fromTime) $fromTime=strtotime($fromTime);
				if($toTime) $toTime=strtotime($toTime)+24*3600;
				
				$pg=trim($_REQUEST["page"]);
				if(!$pg){$pg=1;}
				if(!$pgs){$pgs=30;}
				$tableStr=$conf['db']['prename']."data";
				$tableStr2=$conf['db']['prename']."data a";
				$fieldsStr="time, number, data";
				
				$fieldsStr2="a.time, a.number, a.data";
				$whereStr=" type=$typeid ";
				$whereStr2=" a.type=$typeid ";
				if($fromTime && $toTime){
					$whereStr.=" and time between $fromTime and $toTime";
					$whereStr2.=" and a.time between $fromTime and $toTime";
				}elseif($fromTime){
					$whereStr.=' and time>='.$fromTime;
					$whereStr2.=' and a.time>='.$fromTime;
				}elseif($toTime){
					$whereStr.=' and time<'.$toTime;
					$whereStr2.=' and a.time<'.$toTime;
				}else{}
				$orderStr=" order by a.id desc";
	
				$totalNumber = $mydb->row_count($tableStr,$whereStr);

				if ($totalNumber>0){
			 
                $countcount=0;
				$perNumber=$pgs; //每頁顯示的記錄數
				$page=$pg; //獲得當前的頁面值
				if (!isset($page)) $page=1;
				
				$totalPage=ceil($totalNumber/$perNumber); //計算出總頁數
				$startCount=($page-1)*$perNumber; //分頁開始,根據此方法計算出開始的記錄
				$data = $mydb->row($tableStr2,$fieldsStr2,$whereStr2.' '.$orderStr." limit $startCount,$perNumber");
				
				if($data) foreach($data as $var){
					
				$dArry=explode(",",$var[2]);
				$var['d1']=$dArry[0];
				$var['d2']=$dArry[1];
				$var['d3']=$dArry[2];
				$var['d4']=$dArry[3];
				$var['d5']=$dArry[4];
				
				echo '<tr>';
				echo '<td id="title">'.$var[1].'</td>';
				echo '<td class="wdh" align="center"><div class="ball02">'.$var['d1'].'</div></td>';
				echo '<td class="wdh" align="center"><div class="ball02">'.$var['d2'].'</div></td>';
				echo '<td class="wdh" align="center"><div class="ball02">'.$var['d3'].'</div></td>';
				echo '<td class="wdh" align="center"><div class="ball02">'.$var['d4'].'</div></td>';
				echo '<td class="wdh" align="center"><div class="ball02">'.$var['d5'].'</div></td>';
				echo '</tr>';	
				} ?>   
       	
      <?php } ?>
	</tbody></table>
</div>
<!-- <div id="quickbuy"><a href="">購買重慶時時彩</a></div> //-->
<div class="lhfx_lotterylist_bg"></div>
<div class="lhfx_lotterylist" style="display: none;">
  	<dl>
		<dt>高頻彩</dt>
		
		<dd><a href="/zst/index.php?typeid=1">重慶時時彩<i></i></a></dd>
		<dd><a href="/zst/index.php?typeid=12">新疆時時彩</a></dd>
		<dd><a href="/zst/index.php?typeid=60">天津時時彩</a></dd>
		<dd><a href="/zst/index.php?typeid=61">澳門時時彩</a></dd>

		<dd><a href="/zst/index.php?typeid=62">臺灣時時彩</a></dd>
		<dd><a href="/zst/index.php?typeid=5">騰訊分分彩<i></i></a></dd>
		<dd><a href="/zst/index.php?typeid=26">東京2分彩<i></i></a></dd>
		<dd><a href="/zst/index.php?typeid=14">騰訊5分彩<i></i></a></dd>
		<dd><a href="/zst/index.php?typeid=76">韓國1.5分彩<i></i></a></dd>
		<dd><a href="/zst/index.php?typeid=75">巴西快樂彩<i></i></a></dd>
  	</dl>
	<dl>
		<dt>PK拾</dt>
		<dd><a href="/zst/pk10.php?typeid=20">北京PK拾</a></dd>
		<dd><a href="/zst/pk10.php?typeid=65">澳門PK拾</a></dd>
		<dd><a href="/zst/pk10.php?typeid=66">臺灣PK拾</a></dd>
	</dl>
	<dl>
		<dt>江蘇快3</dt>
		<dd><a href="/zst/k3.php?typeid=79">江蘇快三</a></dd>
		<dd><a href="/zst/k3.php?typeid=63">澳門快三</a></dd>
		<dd><a href="/zst/k3.php?typeid=64">臺灣快三</a></dd>
	</dl>
	<dl>
		<dt>11選5</dt>
		<dd><a href="/zst/11x5.php?typeid=6">廣東11選5</a></dd>
		<dd><a href="/zst/11x5.php?typeid=16">江西11選5</a></dd>
		<dd><a href="/zst/11x5.php?typeid=7">山東11選5</a></dd>
		<dd><a href="/zst/11x5.php?typeid=15">上海11選5</a></dd>
		<dd><a href="/zst/11x5.php?typeid=67">澳門11選5</a></dd>
		<dd><a href="/zst/11x5.php?typeid=68">臺灣11選5</a></dd>
	</dl>
	<dl>
		<dt>快樂8</dt>
      	<dd><a href="/zst/kl8.php?typeid=78">北京快樂8</a></dd>
      	<dd><a href="/zst/kl8.php?typeid=74">韓國快樂8</a></dd>
		<dd><a href="/zst/kl8.php?typeid=73">澳門快樂8</a></dd>
	</dl>
	<dl class="nopb">
		<dt>3D-排列3</dt>
		<dd><a href="/zst/3dp3.php?typeid=9">福彩3D</a></dd>
      	<dd><a href="/zst/3dp3.php?typeid=69">澳門3D</a></dd>
		<dd><a href="/zst/3dp3.php?typeid=70">臺灣3D</a></dd>
		<dd><a href="/zst/3dp3.php?typeid=10">排列3</a></dd>
	</dl>
</div>


<div class="m_footer_annotation">
                        未滿18周歲禁止購買<br>
                Copyright © 阿舍仔娛樂城 版權所有
                <!-- <a href="#" class="m_f_top"></a> -->
</div>

</section>
</div>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.17.2.1"></script>
<script type="text/javascript">
$(function(){
    var riable=0;
    $(".nfdprize_text").click(function(){
        if(riable==0){
            riable=1;
            $(".m-lott-methodBox .nfdprize_text b").addClass('cur')
        }else{
            riable =0;
            $(".m-lott-methodBox .nfdprize_text b").removeClass('cur')
        }
        $(".m-lott-methodBox-list").toggle();
    });
}())
    
</script>

</body>
</html>
