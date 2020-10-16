<?php $this->display('inc_daohang1.php'); ?>
<link rel="stylesheet" href="/css/nsc_m/list.css?v=1.16.11.16">
<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/newskin/js/common.js"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>


<section class="wraper-page">
<form action="/index.php/safe/setCBAccount" method="post" target="ajax" onajax="safeBeforSetCBA" call="safeSetCBA">
<?php if($this->user['coinPassword']){ ?>
 <table width="100%" class="grayTable" border="0" cellspacing="1" cellpadding="4">
<tbody><tr>
  <td colspan="2"><b class="z_red_color">提示: *為必填信息　</b></td>
</tr>
  <tr>
    <td class="tdz3_left"><font class="star_color">*</font>開戶銀行：</td>
    <td class="tdz3_right">
     	<?php
            $myBank=$this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
				$banks=$this->getRows("select * from {$this->prename}bank_list where isDelete=0 and id!=12 and id!=17 and id!=19 and id!=18 and id!=20 and id!=21 and id!=22 and id!=2 and id!=28 and id!=27 and id!=26 and id!=25 and id!=24 and id!=23 and id != 3  order by sort");
				
				$flag=($myBank['editEnable']!=1)&&($myBank);
			?>
			<select name="bankId" class="text" <?=$this->iff($flag, 'disabled')?>>
			<option value="">請選擇...</option>
			<?php foreach($banks as $bank){ ?>
			<option value="<?=$bank['id']?>" <?=$this->iff($myBank['bankId']==$bank['id'], 'selected')?>><?=$bank['name']?></option>
			<?php } ?>
			</select>
    </td>
  </tr>

   <tr>
    <td class="tdz3_left"><font class="star_color">*</font>支行地址：</td>
    <td class="tdz3_right">
    <input type="text" name="countname" maxlength="20" value="<?=preg_replace('/^(\w{4}).*(\w{4})$/','\1***\2',htmlspecialchars($myBank['countname']))?>" <?=$this->iff($flag, 'readonly')?> /><br><span id="branch_msg" class="text_hint red">由1至20個字元或漢字組成，不能使用特殊字元</span>
    </td>
  </tr>
  <tr>
    <td class="tdz3_left"><font class="star_color">*</font><font id="khxm">開戶姓名</font>：</td>
    <td class="tdz3_right">
    <input type="text" name="username" maxlength="5" value="<?=$this->iff($myBank['username'],mb_substr(htmlspecialchars($myBank['username']),0,1,'utf-8').'**')?>" <?=$this->iff($flag, 'readonly')?> /><br><span id="account_name_msg" class="text_hint red">請填寫您的真實姓名，只能是中文字元，最長5個漢字，</span>
    </td>
  </tr>
  <tr>
    <td class="tdz3_left"><font class="star_color">*</font><font id="khzh">銀行卡號</font>：</td>
    <td class="tdz3_right">
    <input type="text" name="account"  onpaste="return false" value="<?=preg_replace('/^(\w{4}).*(\w{4})$/', '\1***********\2',htmlspecialchars($myBank['account']))?>" onkeyup="value=value.replace(/[^\d]/g,'')" <?=$this->iff($flag, 'readonly')?>  maxlength="19"/><br><span id="account_msg" class="text_hint red">(銀行卡卡號由16位元或19位元數位組成，只能手動輸入，不能粘貼)</span>
    </td>
  </tr>
  <tr>
    <td class="tdz3_left"><font class="star_color">*</font><font id="khxm">提款密碼</font>：</td>
    <td class="tdz3_right">
    <input type="password" name="coinPassword" value="<?=preg_replace('/^(\w{4}).*(\w{4})$/','\1***\2',htmlspecialchars($myBank['account']))?>"  class="text" <?=$this->iff($flag, 'readonly')?> /><br><span id="account_name_msg" class="text_hint red">為了你的資金安全，請驗證提款密碼。</span>
    </td>
  </tr>
</tbody></table>
    <div class="list_btn_box"><input type="submit" <?=$this->iff($flag, 'disabled')?> value="確認" class="buttonnormal">　
        <input type="button" value="返回" onclick="checkbackspace();" class="formReset"></div>

</form>


	<?php }else{?>	
		
	<div id="subContent_bet_re">
		<div id="error">
		<h3>
			<font class="hint_red">您還未設定提款密碼，為了您的帳戶安全，請先設定好您的提款密碼</font>
		</h3>
		<div class="yhlb_back"><a href="/index.php/safe/passwd">設置提款密碼</a></div>
						</div>

</div>	
		
<?php }?>
    </section> 
</body></html>
