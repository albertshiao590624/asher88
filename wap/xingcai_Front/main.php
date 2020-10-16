<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 12px;"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<title><?= $this->settings['webName'] ?></title>
<meta name="keywords" content="">
<meta nam="description" content="">
<!--巡覽列-->
<?php
if ($this->type) {
    $row = $this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
    if (!$row['enable']) {
        echo $row['title'] . '已經關閉';
        exit;
    }
} else {
    $this->type    = 1;
    $this->groupId = 2;
    $this->played  = 10;
}
if ($_COOKIE['mode']) {
    $mode = $_COOKIE['mode'];
} else {
    $mode = 2.000;
}

$row1 = $this->getRows("select * from {$this->prename}content where enable=1 and nodeId=1");
$row2 = $this->getRows("select * from {$this->prename}message_receiver where to_uid={$this->user['uid']}");
?>

<link href="/css/newcss/style.css" rel="stylesheet" type="text/css"/>
<link href="/css/newcss/add.css" type="text/css" rel="stylesheet"/>
<link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css" />

<link rel="stylesheet" href="/css/nsc_m/res.css?v=1.16.12.12">
<link href="/css/nsc_m/m-reset.css?v=1.16.12.12" rel="stylesheet" type="text/css">
<link href="/css/nsc_m/m-warp.css?v=1.16.12.12" rel="stylesheet" type="text/css">
<link href="/css/nsc_m/m-lottery.css?v=1.16.12.12" rel="stylesheet" type="text/css">
<link href="/css/jquery.nouislider.css?v=1.16.12.12" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.12.12"></script>
<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.12"></script>
<link href="/js/nsc_m/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
<script type="text/javascript" src="/js/nsc/common.js?v=1.16.12.12"></script>
<script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/nsc_m/nouislider.min.js"></script>

<script>var TIP=true;</script>
<!--script type="text/javascript" src="/skin/js/jquery.cookie.js"></script-->
<!--script type="text/javascript" src="/skin/js/Array.ext.js"></script-->
<!--script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script-->
<script type="text/javascript" src="/skin/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="/skin/js/game.js?v5.0"></script>



</head>
<body >
<!--巡覽列-->

<div id="body">
			 <?php
$lastNo = $this->getGameLastNo($this->type);
$kjHao  = $this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
if ($kjHao)
    $kjHao = explode(',', $kjHao);

$actionNo   = $this->getGameNo($this->type);
$types      = $this->getTypes();
//print_r($types);
$kjdTime    = $types[$this->type]['data_ftime'];
$diffTime   = strtotime($actionNo['actionTime']) - $this->time - $kjdTime;
$kjDiffTime = strtotime($lastNo['actionTime']) - $this->time;
?>
<header class="header wjkjData">
<!-- javascript:window.history.back(); -->
	<a class="m-return-home" href="/index.php">返回大廳</a>
	<span class="btn-slide-bar"></span>
	<div class="m-nav-lott-date">
		<ul id="kaijiang"  style="width:100%" type="<?= $this->type ?>">
	
		<span class="m-n-data"><span class="thisno"><?= $actionNo['actionNo'] ?></span> 期 </span>
		<span class="m-n-countdown" id="sur-times"> -- : -- : -- </span>
		</ul>
	</div>
	<!-- <h1 class="page-title">header</h1> -->
</header>

<!--側導航 -->
		<section class="slide-bar" style="display: none;">
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
								<dt><!--<dt>高頻彩</dt>
								<dd>
									<ul class="lot_list">
										<li><a href="/index.php/index/game/1/2/12">重慶時時彩</a> </li>
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
							</dl>
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
							</dl>
							<!--dl>
								<dt>3D-排列3</dt>
								<dd>
									<ul class="lot_list">
										<li><a href="/index.php/index/game/9">福彩3D</a> </li>
										<!--<li><a href="/index.php/index/game/69">澳門3D</a></li>
										<li><a href="/index.php/index/game/70">臺灣3D</a></li>>
										<li><a href="/index.php/index/game/10">排列3</a></li>
									</ul>
								</dd>
							</dl-->
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
				<?php if($this->user['type']){?>
				<li class="tree_box tree_list">
					<h3 class="one_nav_list team_icon">團隊管理<i class="lnstruction-top"></i></h3>
					<ul class="tree_one">
						<li class="lotter_list_game">
								<div class="m_nav_line"></div>
							<dl class="lnstruction">
								<dd>
									<ul class="lot_list">
										<li class="tree_list"><a href="/index.php/team/gameRecord">團隊記錄</a></li>
										<li class="tree_list"><a href="/index.php/team/coin">團隊帳變</a></li>
										<li class="tree_list"><a href="/index.php/team/report">團隊盈虧</a></li>
										<li class="tree_list"><a href="/index.php/team/memberList">帳號列表</a></li>
										<li class="tree_list"><a href="/index.php/team/addMember">註冊管理</a></li>
										<li class="tree_list"><a href="/index.php/team/addlink">推廣設定</a></li>
										<li class="tree_list"><a href="/index.php/team/linkList">連結管理</a></li>
										<li class="tree_list"><a href="/index.php/team/coinall">團隊統計</a></li>
									</ul>
								</dd>
							</dl>
						</li>
					</ul>
					<div class="m_nav_line"></div>
				</li>
				<?}?>
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
		<!-- <a href="#" id="rece_lott_btn">開獎歷史</a> -->
<!--使用者資訊及彩種-->


 
  <div class="block_three">
<?php
$this->display('index/inc_data_current_new.php');
?>
</div>

	
<!--玩法-->
   <div class="tz_change">
<?php $this->display('game_line.php');?>
  </div>  
<!--玩法選擇-->
<div class="tz_change">
  <div class="tz_work" id="playList">
  <div class="tz_xz">
<?php
$sql= "select groupName from {$this->prename}played_group where id=?";
$groupName = $this->getValue($sql, $this->groupId);

$sql= "select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
$playeds = $this->getRows($sql, $this->groupId);
if (!$playeds) {
    echo '<td colspan="7" align="center">暫無玩法</td>';
    return;
}
if (!$this->played)
    $this->played = $playeds[0]['id'];
?>
<?php
if ($playeds)
    foreach ($playeds as $played) {
        if ($this->played == $played['id'])
            $tpl = $played['playedTpl'];
        if ($played['enable']) {
?>
	<a data_id="<?= $played['id'] ?>" href="#" tourl="/index.php/index/played_new/<?= $this->type ?>/<?= $played['id'] ?>" <?= ($played['id'] == $this->played) ? ' class="tag"' : '' ?> style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $played['name'] ?></a>
	<?php
        }
    }
?>
                    </div>

					
<!--玩法end投注標籤開始-->


<!--div class="tz_info" id="game-helptips">
<?php
$sql= "select simpleInfo, info, example  from {$this->prename}played where id=?";
$playeds = $this->getRows($sql, $this->played);
?>
<p class="wjhelps">說明：<?= $playeds[0]["simpleInfo"] ?><!--<a href="#"><em action="lt_example" class="ico_sl showeg"></em></a><a href="#"><i action="lt_help" class="ico_ques showeg"></i></a></p>
<div id="lt_example" class="game_eg" style="display:none;"><?= $playeds[0]["example"] ?></div>
<div id="lt_help" class="game_eg" style="display:none;"><?= $playeds[0]["info"] ?></div>
<div class="line2">
                    </div>
                  </div-->

<!--選號-->
<div class="ball_list" style="width:100%;">
<div class="num-table" id="num-select">
<?php
if (!$played['enable']) {
    echo '<td colspan="7" align="center">暫無玩法</td>';
    return;
}
$this->display("index/game-played/$tpl.php");
?>
                       </div>
                    </div>
                </div>
				
				
				<!------------------------------------------------------------------------------------->
		<div class="addOrderBox">
                <div class="addOrderLeft">
                    <div class="chooseMsg">
                        <span id="game-tip-dom">請選擇號碼</span>
                       
                    </div>
                    <div class="m_funding_box">
                        <div class="jiangjin" id="game-dom">
                            <?php
if ($this->settings['yuanmosi'] == 1) {
?>
                  <b value="2.000" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian0'] ?>" class="danwei">元</b><?php
}
?>
                  <?php
if ($this->settings['jiaomosi'] == 1) {
?>
                  <b value="0.200" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian1'] ?>" class="danwei">角</b><?php
}
?>
                  <?php
if ($this->settings['fenmosi'] == 1) {
?>
                  <b value="0.020" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian2'] ?>" class="danwei dwon">分</b><?php
}
?>
                  <?php
if ($this->settings['limosi'] == 1) {
?>
                  <b value="0.002" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian3'] ?>" class="danwei">厘</b><?php
}
?>
                        <div class="multipleBox">
                            <div class="multipleCon re"><!--i class="surbeishu">&#xe603;</i-->
                                <input  id="beishu" value="<?= $this->ifs($_COOKIE['beishu'], 1) ?>" class="text"/><!--i class="addbeishu">&#xe602;</i-->
                            </div>
                            <span class="bei">倍</span>
                        </div>
                        <input type="button" class="addBtn" id="lt_sel_insert" onClick="gameActionAddCode()" value="增加投注">
                    </div>
                    
                </div>
                <div class="addOrderRight">
                    
                </div>
            </div>		
				<!------------------------------------------------------------------------------------->	
				
				<div class="lotteryBottom">
       <div class="touzhu-cont" >
  <table width="100%" cellpadding="0" cellspacing="0" >
  </table>
</div>
        <div class="orderNow">
            <div class="chooseAllMsg">
                <p>總注數 <span id="all-count" class="num">0</span> 注</p>
				
				
                <div class="checkZhui fqzhBox">
				<label  name="lt_trace_if" >
                 <b class="fq">發起追號</b>
               <input name="zhuiHao" value="1" type="checkbox">
                </div>
				
               	<div class="hemai">
				 <input type="checkbox" class="is_combine" value="1" id="cannel_chckbox"/><b class="fq">發起合買</b>
				 </div>
            </div>
                <p class="m_total_amout">總金額 <span id="all-amount" class="num orange">0</span> 元</p>
                <div class="sendChoose"><input type="button" class="addtz" id="btnPostBet"  value="新增投注"></div>
               <!-- <a href="">121212</a> -->
            <!-- <a class="m_see_more" href="?controller=gameinfo&action=gamelistbyself">查看投注記錄</a> -->
            <a class="m_see_more"  href="/index.php/index/yxjl" title="投注記錄" button="關閉:defaultModalCloase" width="100%" target="modal">查看投注記錄</a>
        </div>
    </div>
             </div>      
              
        <?php $this->display('inc_footer.php'); ?>
		
<!--首頁遊戲記錄開始-->
</section>

</div>
<div id="wanjinDialog"></div>
<!--end 2020/6/28-->
<script type="text/javascript">
var game={
	check1:<?= json_encode($check1) ?>,
	check2:<?= json_encode($check2) ?>,
	type:<?= json_encode($this->type) ?>,
	played:<?= json_encode($this->played) ?>,
	groupId:<?= json_encode($this->groupId) ?>
},
user="<?= $this->user['username'] ?>",
aflag=<?= json_encode($this->user['admin'] == 1) ?>;
function showx(x){
	if(x==82){$('.ball_write').hide();}else{$('.ball_write').show();}
}
</script>




  
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
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
</body></html>
