<!--//复制程序 flash+js------end-->
<link rel="stylesheet" type="text/css" href="/newskin/css/game-index.css">
<link rel="stylesheet" type="text/css" href="/newskin/css/game-mian.css">
<link rel="stylesheet" type="text/css" href="/newskin/css/manager.css">
<link rel="stylesheet" href="/css/nsc/chong-list.css" />


<?php
$this->freshSession();
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where b.isDelete=0 and mb.id=$mBankId and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
?>
<!--左边栏body-->



<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>

    </tr>
     <tr height=25 class='table_b_tr_b'>
     
      <th scope="col" style="background: #FFFFFF;color: #000000;font-size: 15px;border:1px solid #e9e9e9;width: 50%;height: 50px;text-indent: 16px;">儲值金额：<?=$args[0]['amount']?></th>
      <th scope="col" style="background: #fff;height:55px;width: 50%;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值编号 ：<?=$args[0]['rechargeId']?></th>
   
    </tr>
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="center" class="copyss">
    <form action="/zypay/pays.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="formNext" value="确认支付">
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    
    <input name="td" type="hidden" value="Dpbank" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
</form>
  </td></tr></table>
 <!--左边栏body结束-----------------------支付宝------------------------------------------------------------->
<?
}else if($memberBank['bankId']==2){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值类型：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金额：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值编号：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/zypay/pays.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="formNext" value="确认支付">
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    
    <input name="td" type="hidden" value="Dpali" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
</form>
</td>
</tr>
</table>
 <!--左边栏body结束-------------------------------------------支付宝结束--------------------------------------------------------->
 
 <!---------------------------------------------微信支付--------------------------------------------------------->
<? }else if($memberBank['bankId']==20){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值类型：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金额：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值编号：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/zypay/pays.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="formNext" value="确认支付">
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    
    <input name="td" type="hidden" value="Dpwx" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
</form>
</td>
</tr>
</table>
 <!---------------------------------------------微信支付结束--------------------------------------------------------->
 
 <!---------------------------------------------财付通--------------------------------------------------------->
<? }else if($memberBank['bankId']==3){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>
 <table width="100%" height="55" align="center">
                  <tr>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">1.选择银行并输入金额</th>
                  <th scope="col" style="background: #f5f5f5;height:55px;color: #35aaff;font-size: 15px;border:1px solid #e9e9e9">2.确认儲值信息</th>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">3.完成儲值</th>

                  </tr>
                  </table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值类型：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金额：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值编号：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/koudai/getway.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="确认支付">
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    <input name="Bankco" type="hidden" value="3" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
    </tr>
    </table>
</form>
</td>
</tr>
</table>
 <!---------------------------------------------财付通结束--------------------------------------------------------->
 <!---------------------------------------------微信手动支付--------------------------------------------------------->
 <? }else if($memberBank['bankId']==21){
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
              <tbody><tr>
                                
                 </tr>
    <tr>
      <td align="right" style="width:20%;">儲值信息：</td>
    </tr>
	<tr>
      <td align="right">收款户名：</td>
      <td><input id="bank-username" readonly value="<?=$memberBank["username"]?>" /></td> 
    </tr>
    <tr>
      <td align="right">儲值金额：</td>
      <td><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" /></td>
    </tr>
	<tr>
      <td align="right">儲值编号：</td>
      <td><input id="username" readonly value="<?=$args[0]['rechargeId']?>" /></td>  
    </tr>
    <tr>
      <td align="right">扫码支付：</td>
	  <td>
     <div class="qrimage-wrap white b-a text-center">
	
	 <img id="qrimage" src="/images/wx.jpg">
	 </div>
	 </td>
	 
	 
    </tr>

<!--左边栏body结束-->

<tr>
<div class="tips">
	<dl>
        <dt>儲值说明：</dt>
        <dd>1.每次"儲值编号"均不相同,务必将"儲值编号"正确复制填写到引号汇款页面的"说明"栏目中;</dd>
        <dd>2.帐号不固定，转帐前请仔细核对该帐号;</dd>
        <dd>3.儲值金额与转账金额不符，儲值将无法到账;</dd>
        <dd>4.转账后如10分钟未到账，请联系客服，告知您的儲值编号和您的儲值金额。</dd>
		<dd>5.支付宝，微信，财付通，手动儲值可忽略以上几点。</dd>
    </dl>
</div>
</tr>
</table>  
<!---------------------------------------------支付宝手动支付--------------------------------------------------------->
 <? }else if($memberBank['bankId']==22){
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
              <tbody><tr>
                                
                 </tr>
    <tr>
      <td align="right" style="width:20%;">儲值信息：</td>
    </tr>
	<tr>
      <td align="right">收款户名：</td>
      <td><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:220px;" /></td> 
    </tr>
    <tr>
      <td align="right">儲值金额：</td>
      <td><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" style="width:220px;" /></td>
    </tr>
	<tr>
      <td align="right">儲值编号：</td>
      <td><input id="username" readonly value="<?=$args[0]['rechargeId']?>" style="width:220px;" /></td>  
    </tr>
    <tr>
      <td align="right">扫码支付：</td>
	  <td>
     <div class="qrimage-wrap white b-a text-center">
	
	 <img id="qrimage" src="/images/zfb.jpg">
	 </div>
	 </td>
	 
	 
    </tr>

<!--左边栏body结束-->

<tr>
<div class="tips">
	<dl>
        <dt>儲值说明：</dt>
        <dd>1.每次"儲值编号"均不相同,务必将"儲值编号"正确复制填写到引号汇款页面的"说明"栏目中;</dd>
        <dd>2.帐号不固定，转帐前请仔细核对该帐号;</dd>
        <dd>3.儲值金额与转账金额不符，儲值将无法到账;</dd>
        <dd>4.转账后如10分钟未到账，请联系客服，告知您的儲值编号和您的儲值金额。</dd>
		<dd>5.支付宝，微信，财付通，手动儲值可忽略以上几点。</dd>
    </dl>
</div>
</tr>
</table>  

 
 
 
<? }else{
?>
<!--左边栏body-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="formTable">
              <tbody><tr>
                                
                 </tr>
    <tr>
      <td align="right" style="width:20%;">儲值信息：</td>
    </tr>
    
    <tr>
      <td align="right">儲值类型：</td>
      <td><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" style="height:3.74rem;"/>
            <a id="bank-link" target="_blank" href="<?=$memberBank['bankHome']?>" class="spn11" style="margin-left:50px;">进入银行网站>></a>
      </td> 
    </tr>
	<tr>
      <td align="right">收款户名：</td>
      <td><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:220px;" /></td> 
    </tr>
    <tr>
      <td align="right">收款账号：</td>
      <td><input id="bank-account" readonly value="<?=$memberBank["account"]?>" style="width:220px;" /></td> 
    </tr>
     <tr>
      <td align="right">儲值金额：</td>
      <td><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" style="width:220px;" />*网银儲值金额必须与网站填写金额一致方能到账！</td>
    </tr>
     <tr>
      <td align="right">儲值编号：</td>
      <td><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
     *网银儲值请务必将此编号填写到汇款“说明”里！</td>  
    </tr>
<!--左边栏body结束-->

<tr>
<div class="tips">
	<dl>
        <dt>儲值说明：</dt>
        <dd>1.每次"儲值编号"均不相同,务必将"儲值编号"正确复制填写到引号汇款页面的"说明"栏目中;</dd>
        <dd>2.帐号不固定，转帐前请仔细核对该帐号;</dd>
        <dd>3.儲值金额与转账金额不符，儲值将无法到账;</dd>
        <dd>4.转账后如10分钟未到账，请联系客服，告知您的儲值编号和您的儲值金额。</dd>
    </dl>
</div>
</tr>
</table> 
<?php }?>