<?php $this->display('inc_daohang1.php'); ?>
<link rel="stylesheet" href="/css/nsc_m/m-list.css?v=1.17.1.23">
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
       <section class="wraper-page">
	<div id="changeloginpass">
<div class="tab-first clearfix">
<ul class="list_menus-li">
	<li class="on"><a href="/index.php/safe/loginpasswd">修改登入密碼</a></li>
	  <?php if($args[0]){ ?>
    <li><a href="/index.php/safe/passwd">修改提款密碼</a></li>
	<?php }else{?>
	  <li><a href="/index.php/safe/passwd">設置提款密碼</a></li>
	  <?php }?>
    </ul>
<div id="tabs-1">
<form action="/index.php/safe/setPasswd" method="post" target="ajax" onajax="safeBeforSetPwd" call="safeSetPwd">
<ul class="form_enter_ul">
<li><label class="w1">輸入舊登入密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="oldpassword" type="password" class="password " maxlength="13">
</div>
</div>
</li>
<li><label class="w1">輸入新登入密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="newpassword" class="password " maxlength="13">
</div>
</div></li>
<li><label class="w1">確認新登入密碼：</label>
<div class="form_li-r w_r1">
<div class="enter_input_kuang1">
<input type="password" name="qrpassword" class="password confirm" maxlength="13">
</div>
</div>
</li>
</ul>
	    
<div class="list_btn_box">
<input id="resetcoinP2" type="reset" value="重置" onClick="this.form.reset()" class="formReset">
<input id="setcoinP2" type="submit" value="修改" class="formChange">
</div>
<div class="list_page">備註：請妥善保管好您的登入密碼，如遺忘請聯繫線上客服處理</div>
</form>
</div>
	    
		
</div>
</div>
<div class="m_footer_annotation">
                        未滿18周歲禁止購買<br>
                Copyright ©  阿舍仔娛樂城版權所有
</div>
<div class="padding_fot_b20 "></div>


</div>
</body></html>
