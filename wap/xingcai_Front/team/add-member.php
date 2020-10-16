<?php $this->display('inc_daohang1.php'); ?>
<link rel="stylesheet" href="/css/nsc_m/m-list.css?v=1.17.1.23">
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>

</head>
<body>
  <section class="wraper-page">
 <div class="topbar_padding">
<form action="/index.php/team/insertMember" method="post" target="ajax" onajax="teamBeforeAddMember" call="teamAddMember">
<input type="hidden" name="flag" value="insert">
<input type="hidden" name="controller" value="user">
<input type="hidden" name="action" value="adduser">
<div class="fandianBox"><h3>開戶配額</h3></div>
    <!---->
<!--                  -->
        
   <!--   -->
<div class="zzgl_user">
<ul class="form_enter_ul">
<li><label class="w2">帳號類型：</label>
    <div class="form_li-r w_r2 u_add_zr_m">
       
                     <div class="switch_choose">
                        <label class="bk_l current"><input type="radio" name="usertype" value="1" checked="checked" class="no_bk-bg"><span data="daili"> 代理</span></label>
                        <!--<label class="bk_r"><input type="radio" name="usertype" value="0" class="no_bk-bg"><span data="huiyuan"> 會員帳號</span></label>-->
                      </div>
               
    </div>
</li>
<li><label class="w2">帳號名：</label><div class="form_li-r w_r2"><div class="enter_input_kuang1"><input type="text" name="username" onKeyUp="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="13" placeholder="請輸入帳號名"></div><p class="hint_p" id="userchk"></p></div></li>
<li><label class="w2">密碼：</label><div class="form_li-r w_r2"><div class="enter_input_kuang1"><input type="password" name="password" maxlength="13" placeholder="請輸入密碼"></div><p class="hint_p" id="pwdchk"></p></div></li>
<li><label class="w2">確認密碼：</label><div class="form_li-r w_r2"><div class="enter_input_kuang1"><input type="password" id="cpasswd" maxlength="13" placeholder="請確認密碼"></div><p class="hint_p" id="pwdchk"></p></div></li>
<li><label class="w2">QQ帳號：</label><div class="form_li-r w_r2"><div class="enter_input_kuang1"><input type="text" name="qq" maxlength="12" placeholder="請輸入QQ號碼"></div><p class="hint_p" id="pwdchk"></p></div></li>
</ul>
</div>

<div id="lotteriesform">
<div class="fandianBox"><h3>返點設置</h3></div>
   <div class="set_list">
    <label>自身保留返點：</label>
    <div class="calendar_input_kuang3">
	<input type="text" name="fanDian" max="<?=$this->user['fanDian']?>" value=""  fanDianDiff=<?=$this->settings['fanDianDiff']?> onKeyUp="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" maxlength="5" placeholder="請設置返點">
	</div>
	<input type="submit" class="formWord" value="增加會員" id="addmenber">
    <p><span class="red-world">返點為(0%-<?=$this->iff(($this->user['fanDian']-$this->settings['fanDianDiff'])<=0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])?>%)</span>
	<span style="display:none" id="keeppoint_min">0.1</span><span style="display:none" id="keeppoint_max">6.6</span></p>
    </div>
    <div id="allbackset" class="overflowHidden" style="display:block;">
        <!--span style="float:right"><a href='#' onclick="kuaijiexuanxiang1();return(false);" class="underline">返點全滿</a> | <a href="#" class="underline" onclick='kuaijiexuanxiang3();return(false);'>返點清零</a></span-->
        </div>
  
<!--/form-->
<script type="text/javascript">
	//帳號類型切換span
	$(".u_add_zr_m span").unbind("click").click(function(){
		var data = $(this).attr("data");
		$(".u_add_zr_m span").removeClass("hover");
        $(this).parent('label').addClass("current").siblings("label").removeClass("current");
        $(this).addClass("hover");
		$("input[name='usertype']").prop("checked", false);
		$("input.radio_" + data).prop("checked", true);
	});
	
</script>
 
</div></form>
<div class="m_footer_annotation">
                        未滿18周歲禁止購買<br>
                Copyright ©  阿舍仔娛樂城版權所有
                <!-- <a href="#" class="m_f_top"></a> -->
</div>
<div class="padding_fot_b20 "></div>
 </body>
 </html>a
