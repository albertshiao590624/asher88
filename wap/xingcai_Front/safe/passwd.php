<?php $this->display('inc_daohang1.php'); ?>
<link rel="stylesheet" href="/css/nsc_m/m-list.css?v=1.17.1.23">
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
       <section class="wraper-page">
	   <?php if($args[0]){ ?>
	   <div id="changeloginpass">
<div class="tab-first clearfix">
<ul class="list_menus-li">
	<li><a href="/index.php/safe/loginpasswd">修改登入密碼</a></li>
    <li class="on"><a href="/index.php/safe/passwd">修改提款密碼</a></li>
    </ul>
<div id="tabs-1">
<form action="/index.php/safe/setCoinPwd2" method="post" target="ajax" onajax="safeBeforSetCoinPwd2" call="safeSetPwd">
<ul class="form_enter_ul">
<li><label class="w1">輸入舊提款密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="oldpassword" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="13" class="password">
</div>
</div>
</li>
<li><label class="w1">輸入新提款密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="newpassword" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="13" class="password">
</div>
</div></li>
<li><label class="w1">確認新提款密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="qrpassword" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="13" class="password confirm">
</div>
</div>
</li>
</ul>
	    
<div class="list_btn_box">
<input id="resetcoinP2" type="reset" value="重置" onClick="this.form.reset()" class="formReset">
<input id="setcoinP2" type="submit" value="修改" class="formChange">
</div>
<div class="list_page">備註：請妥善保管好您的提款密碼，如遺忘請聯繫線上客服處理</div>
</form>
</div>
	    
		
</div>
</div>
<?php }else{?>
	   <div id="changeloginpass">
<div class="tab-first clearfix">
<ul class="list_menus-li">
	<li><a href="/index.php/safe/loginpasswd">修改登入密碼</a></li>
    <li class="on"><a href="/index.php/safe/passwd">設置提款密碼</a></li>
    </ul>
<div id="tabs-1">
<form action="/index.php/safe/setCoinPwd" method="post" target="ajax" onajax="safeBeforSetCoinPwd" call="safeSetPwd">
<ul class="form_enter_ul">

<li><label class="w1">輸入新登入密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="newpassword" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="13" class="password">
</div>
</div></li>
</ul>
	    
<div class="list_btn_box">
<input id="resetcoinP2" type="reset" value="重置" onClick="this.form.reset()" class="formReset">
<input id="setcoinP2" type="submit" value="設置" class="formChange">
</div>
<div class="list_page">備註：由純數位組成6-13個數位，不能和登陸密碼相同</div>
</form>
</div>
<?php }?>	    
	<div class="m_footer_annotation">
                        未滿18周歲禁止購買<br>
                Copyright ©  阿舍仔娛樂城版權所有
</div>	
</div>
</div>
</body></html>
