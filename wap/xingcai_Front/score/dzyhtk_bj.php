<?php
$sql = "select * from {$this->prename}member_bank where uid={$this->user['uid']}";

$user_bank= $this->getRow($sql);
if($user_bank){
	$sa = 1;
}else{
	$sa = 0;
}

?>

<div>
<style>
form *{    font-size: 12px;}
</style>
<form action="/index.php/score/dzyhtked_bj" method="post" target="ajax"  call="dzyhtk_bj" dataType="html">

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="grayTable">
                <!---->
                	                                              <tr>
              <td class="u_add_zl">提款人：</td>
              <td class="u_add_zr" >
              <label><?=$this->user['username']?></span></label>
              </td>
              </tr>
              <tr>
                <td class="u_add_zl">存款时间：</td>
                <td class="u_add_zr" ><?=date('Y-m-d H:i',$args[0]['time'])?></td>
              </tr>
              <tr>
                <td class="u_add_zl">提款时间：</td>
                <td class="u_add_zr" ><?=date('Y-m-d H:i',$this->time)?></td>
              </tr>
              <tr>
                <td class="u_add_zl">本金：</td>
                <td class="u_add_zr" ><?=$args[0]['ck_money']?>元</td>
              </tr>
			  <?php $cktime = $args[0]['time']+2592000; if($cktime >= $this->time){?>
			  <tr>
                <td class="u_add_zl">投资周期：</td>
                <td class="u_add_zr" >不足30天，平台将要收取手续费</td>
              </tr>
			  <tr>
                <td class="u_add_zl">手续费：</td>
                <td class="u_add_zr" ><?=$args[0]['ck_money']*($this->dzyhsettings['txsxf']/100)?>元(<?=$this->dzyhsettings['txsxf']?>%)</td>
              </tr>
			  <?php }else {?>
			 <tr>
                <td class="u_add_zl">手续费：</td>
                <td class="u_add_zr" >0元</td>
              </tr>
			  
			  <?php }?>
			  
			  <?php if($sa == 1){?>
			  
			  <tr>
                <td class="u_add_zl">银行卡号:</td>
                <td class="u_add_zr" ><input type="text" name="yhkh"  value="<?=$user_bank['account']?>" style="width:200px;"/></td>
              </tr>
			   <tr>
                <td class="u_add_zl">银行开户行:</td>
                <td class="u_add_zr" ><input type="text" name="yhkhh"  value="<?=$user_bank['countname']?>" style="width:200px;"/></td>
              </tr>
			   <tr>
                <td class="u_add_zl">银行开户名:</td>
                <td class="u_add_zr" ><input type="text" name="yhhm" value="<?=$user_bank['username']?>" style="width:200px;"/></td>
              </tr>
			  <tr>
                <td class="u_add_zl">资金密码：</td>
                <td class="u_add_zr" ><input type="password" name="coinpassword" id="coinpassword" value=""/></td>
				<input type="hidden" name="id"  value="<?=$args[0]['id']?>"/>
              </tr>
			  <tr>
                <td class="u_add_zl">验证码：</td>
                <td class="u_add_zr" ><input type="text" name="vcode" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]/,'');}).call(this)" onblur="this.v();" maxlength="4"/><img width="58" height="32" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></td>
              </tr>
			  
			  
			  <?php }else {?>
			  <tr>
			   <td class="u_add_zl"></td>
			   <td class="u_add_zl"><a href="/index.php/safe/info">您尚未绑定银行卡，点击立即去绑定</a>
			   </td>
			  </tr>
			  
			  <?php }?>
            
</form>
</div>