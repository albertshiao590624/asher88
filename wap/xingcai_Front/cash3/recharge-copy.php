<!--//复制程序 flash+js------end-->
<link rel="stylesheet" href="/css/nsc/chong-list.css" />
<?php
$this->freshSession();
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where b.isDelete=0 and mb.id=$mBankId and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
?>
<!--左边栏body-->
<div class="content3 wjcont">
 <div class="title"><span>银行选择：</span></div>
 <div class="body">
<form action="/qwpay/Req.php" method="POST" name="a32" href="#" target="_blank">
     <div class="chongzhi3">
	 <h2></h2>

<?php
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where mb.id=$mBankId and b.isDelete=0 and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
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
    <tr class='table_b_th'>
    </ul>
      
<td align="left">
	  <SCRIPT language=Javascript type=text/javascript>
	    function SelectBank(n) {
           document.getElementById("bank" + n).checked = true;
	    }
</SCRIPT>
	<li>
	<table width="50" border="0" style="    margin-left: 60px;">
	<tr>
<table width="414" border="0" align="center"  cellpadding="2" cellspacing="0" id="banklist" >
	<tr>
	        <!--<td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="967" checked>
            <img src="/imgbank/bank/banklist_01.png" title="工商银行" alt="工商银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="964">
		    <img src="/imgbank/bank/banklist_03.png" title="中国农业银行"  alt="中国农业银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="965">
            <img src="/imgbank/bank/banklist_02.png" title="建设银行" alt="建设银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td width="191" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="989">
            <img src="/imgbank/bank/banklist_21.png" title="北京银行" alt="北京银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
	      </tr>
	      <tr>								     
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="963">
	        <img src="/imgbank/bank/banklist_05.png" title="中国银行" alt="中国银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            <td>
            <div class="banklogo"><input name="paytype" type="radio" value="981">
            <img src="/imgbank/bank/banklist_06.png" title="交通银行" alt="交通银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            <td>
			
            <div class="banklogo"><input name="paytype" type="radio" value="986">
            <img src="/imgbank/bank/banklist_19.png" title="光大银行" alt="光大银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td><div class="banklogo"><input name="paytype" type="radio" value="971">
            <img src="/imgbank/bank/banklist_16.png" title="中国邮政" alt="中国邮政"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
		  
	        <td height="40">  <div class="banklogo"><input name="paytype" type="radio" value="970"  />
	          <img src="/imgbank/bank/banklist_04.png" title="招商银行" alt="招商银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			  
	        <td><div class="banklogo"><input name="paytype" type="radio" value="980" />
            <img src="/imgbank/bank/banklist_18.png" title="中国民生银行" alt="中国民生银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="985" />
            <img src="/imgbank/bank/banklist_15.png" title="广发银行" alt="广发银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="990">
            <img src="/imgbank/bank/banklist_24.png" title="北京农村商业银行" alt="北京农村商业银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
		  
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="979" />
	        <img src="/imgbank/bank/banklist_22.png" title="南京银行" alt="南京银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="983" />
            <img src="/imgbank/bank/banklist_10.png" title="宁波银行" alt="宁波银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="978" />
            <img src="/imgbank/bank/banklist_23.png" title="平安银行" alt="平安银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="987">
            <img src="/imgbank/bank/banklist_25.png" title="东亚银行" alt="东亚银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="977">
            <img src="/imgbank/bank/banklist_07.png"  title="上海浦东发展银行" alt="上海浦东发展银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            
			<td><div class="banklogo"><input name="paytype" type="radio" value="972">
            <img src="/imgbank/bank/banklist_08.png" title="兴业银行" alt="兴业银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="985">
	         <img src="/imgbank/bank/banklist_17.png" title="深圳发展银行" alt="深圳发展银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
				
			<td><div class="banklogo"><input name="paytype" type="radio" value="975">
            <img src="/imgbank/bank/banklist_11.png"  title="上海银行" alt="上海银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="962">
            <img src="/imgbank/bank/banklist_09.png" title="中信银行" alt="中信银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            
			<td><div class="banklogo"><input name="paytype" type="radio" value="982">
            <img src="/imgbank/bank/banklist_20.png" title="华夏银行" alt="华夏银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="988">
	        <img src="/imgbank/bank/banklist_13.png" title="渤海银行" alt="渤海银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="968" />
            <img src="/imgbank/bank/banklist_14.png" title="浙商银行" alt="浙商银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>--!>
	      </tr>
           <tr>
		   <td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="992">
           <img src="/imgbank/bank/zfb.png" title="支付宝" alt="支付宝"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="1004">
	        <img src="/imgbank/bank/weixin.jpg" title="微信" alt="微信"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="993" />
            <img src="/imgbank/bank/cft.jpg" title="财富" alt="财富"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/qwpay/req.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="formNext" value="确认支付">
    <input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</form>
      </table>
	  </td> 
  </tr>
    </tr>
    </table>
<?php }?>

	
	
	
	

<?php
} elseif($memberBank['bankId'] == 20) {
?>
</style>
<style>
.page-wrapper{min-height:650px;}.page-info table td{padding: 5px;}.page-info{margin-top: 98px;}
</style>
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
	<form action="/qwpay/req.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="确认支付">
    <input type="hidden" name="paytype" value="1004" />
    <input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />

    </tr>
    </table>
</form>
</td>
</tr>
</table>
	
	
	
	



<?php
} elseif($memberBank['bankId'] == 2) {
?>
</style>
<style>
.page-wrapper{min-height:650px;}.page-info table td{padding: 5px;}.page-info{margin-top: 98px;}
</style>
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
	<form action="/qwpay/req.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="确认支付">
    <input type="hidden" name="paytype" value="992" />
    <input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />

    </tr>
    </table>
</form>
</td>
</tr>
</table>



<?php
} elseif($memberBank['bankId'] == 2000) {
?>
</style>
<style>
.page-wrapper{min-height:650px;}.page-info table td{padding: 5px;}.page-info{margin-top: 98px;}
</style>
<form action="/qwpay/req.php" method="POST" name="a32" target="_blank">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
<div class="content3 wjcont">
 <div class="title"><span>儲值信息</span></div>
 <div class="body">
 <div class="chongzhi1">
 	<h2>儲值信息：</h2>
    <ul>
     <li><span>银行类型：</span><img src="/imgbank/zfb.png" width="155" /></li>
     <li><span>儲值编号：</span><?=$args[0]['rechargeId']?></li>
     <li><span>儲值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
    </ul>
    <div class="chongzhi3">
      <h3 style="    margin-top: 10px;"><input name="submit2" type='submit' style="width:130px; height:36px; margin-left:20%" class="btn btn-action" value="进入支付" /></h3></td> 
 
 </div>
 </div>
	<input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="paytype" value="992" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</form>
 <div class="chongzhi2">
 	<h3>儲值说明：</h3>
    <ul>
     <li>1、平台支持"微信，支付宝"儲值,单笔‘最低10元，最高5000’大额儲值请使用在线支付；</li>
     <li>2、每次"扫一扫"不可重复刷新,务必确认"儲值信息"确认无误后，请点击"进入儲值"进行支付；</li>
     <li>3、‘二维码’不慎刷新，请再次点击儲值获取新的‘二维码’然后请再次仔细核对支付信息；</li>
     <li>4、儲值金额与网友转账金额不符，儲值将无法到账；</li>
     <li>5、扫描后如30S未到账，请联系客服，告知您的儲值编号和您的儲值金额及你的银行用户姓名。</li>
         </ul>
 </div>
  <div class="bank"></div>
  </div>
  <div class="foot"></div>
</div>

<?php
} elseif($memberBank['bankId'] == 3) {
?>
</style>
<style>
.page-wrapper{min-height:650px;}.page-info table td{padding: 5px;}.page-info{margin-top: 98px;}
</style>
<form action="/qfpay/req.php" method="POST" name="a32" target="_blank">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
<div class="content3 wjcont">
 <div class="title"><span>儲值信息</span></div>
 <div class="body">
 <div class="chongzhi1">
 	<h2>儲值信息：</h2>
    <ul>
     <li><span>银行类型：</span><img src="/imgbank/cft.jpg" width="155" /></li>
     <li><span>儲值编号：</span><?=$args[0]['rechargeId']?></li>
     <li><span>儲值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
    </ul>
    <div class="chongzhi3">
	<h3 style="    margin-top: 10px;"><input id="setcz" class="an" type="submit" value="进入儲值"><input type="reset" id="resetcz" class="an" value="重置"></h3>
 </div>
 </div>
	<input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="paytype" value="993" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</form>
 <div class="chongzhi2">
 	<h3>儲值说明：</h3>
    <ul>
     <li>1、平台支持"微信，支付宝,QQ二维码"儲值,单笔‘最低10元，最高5000’大额儲值请使用在线支付；</li>
     <li>2、每次"扫一扫"不可重复刷新,务必确认"儲值信息"确认无误后，请点击"进入儲值"进行支付；</li>
     <li>3、‘二维码’不慎刷新，请再次点击儲值获取新的‘二维码’然后请再次仔细核对支付信息；</li>
     <li>4、儲值金额与网友转账金额不符，儲值将无法到账；</li>
     <li>5、扫描后如30S未到账，请联系客服，告知您的儲值编号和您的儲值金额及你的银行用户姓名。</li>
         </ul>
 </div>
  <div class="bank"></div>
  </div>
  <div class="foot"></div>
</div>



<?php
} elseif($memberBank['bankId'] == 23) {
?>
<div class="content3 wjcont">
<div class="title"><span>银行选择：</span></div>
 <div class="body">
<form action="/qfpay/Req.php" method="POST" name="a32" href="#" target="_blank">
 <div class="chongzhi1">
 	<h2>儲值信息：</h2>
    <ul>
     <li><span>儲值金额：</span><?= $args[0]['amount'] ?>     </li>
     <li><span>儲值编号：</span><?= $args[0]['rechargeId'] ?>    </li>
    </ul>
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
    <tr class='table_b_th'>
    </ul>
      
<td align="left">
	  <SCRIPT language=Javascript type=text/javascript>
	    function SelectBank(n) {
           document.getElementById("bank" + n).checked = true;
	    }
</SCRIPT>
	<li>
	<table width="50" border="0" style="    margin-left: 60px;">
	<tr>
<table width="414" border="0" align="center"  cellpadding="2" cellspacing="0" id="banklist" >
	<tr>
	        <!--<td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="967" checked>
            <img src="/imgbank/bank/banklist_01.png" title="工商银行" alt="工商银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="964">
		    <img src="/imgbank/bank/banklist_03.png" title="中国农业银行"  alt="中国农业银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="965">
            <img src="/imgbank/bank/banklist_02.png" title="建设银行" alt="建设银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td width="191" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="989">
            <img src="/imgbank/bank/banklist_21.png" title="北京银行" alt="北京银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
	      </tr>
	      <tr>								     
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="963">
	        <img src="/imgbank/bank/banklist_05.png" title="中国银行" alt="中国银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            <td>
            <div class="banklogo"><input name="paytype" type="radio" value="981">
            <img src="/imgbank/bank/banklist_06.png" title="交通银行" alt="交通银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            <td>
			
            <div class="banklogo"><input name="paytype" type="radio" value="986">
            <img src="/imgbank/bank/banklist_19.png" title="光大银行" alt="光大银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
            <td><div class="banklogo"><input name="paytype" type="radio" value="971">
            <img src="/imgbank/bank/banklist_16.png" title="中国邮政" alt="中国邮政"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
		  
	        <td height="40">  <div class="banklogo"><input name="paytype" type="radio" value="970"  />
	          <img src="/imgbank/bank/banklist_04.png" title="招商银行" alt="招商银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			  
	        <td><div class="banklogo"><input name="paytype" type="radio" value="980" />
            <img src="/imgbank/bank/banklist_18.png" title="中国民生银行" alt="中国民生银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="985" />
            <img src="/imgbank/bank/banklist_15.png" title="广发银行" alt="广发银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="990">
            <img src="/imgbank/bank/banklist_24.png" title="北京农村商业银行" alt="北京农村商业银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
		  
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="979" />
	        <img src="/imgbank/bank/banklist_22.png" title="南京银行" alt="南京银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="983" />
            <img src="/imgbank/bank/banklist_10.png" title="宁波银行" alt="宁波银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
	        <td><div class="banklogo"><input name="paytype" type="radio" value="978" />
            <img src="/imgbank/bank/banklist_23.png" title="平安银行" alt="平安银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="987">
            <img src="/imgbank/bank/banklist_25.png" title="东亚银行" alt="东亚银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="977">
            <img src="/imgbank/bank/banklist_07.png"  title="上海浦东发展银行" alt="上海浦东发展银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            
			<td><div class="banklogo"><input name="paytype" type="radio" value="972">
            <img src="/imgbank/bank/banklist_08.png" title="兴业银行" alt="兴业银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="985">
	         <img src="/imgbank/bank/banklist_17.png" title="深圳发展银行" alt="深圳发展银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
				
			<td><div class="banklogo"><input name="paytype" type="radio" value="975">
            <img src="/imgbank/bank/banklist_11.png"  title="上海银行" alt="上海银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
	      <tr>
	        <td height="40"><div class="banklogo"><input name="paytype" type="radio" value="962">
            <img src="/imgbank/bank/banklist_09.png" title="中信银行" alt="中信银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
            
			<td><div class="banklogo"><input name="paytype" type="radio" value="982">
            <img src="/imgbank/bank/banklist_20.png" title="华夏银行" alt="华夏银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="988">
	        <img src="/imgbank/bank/banklist_13.png" title="渤海银行" alt="渤海银行"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="968" />
            <img src="/imgbank/bank/banklist_14.png" title="浙商银行" alt="浙商银行"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>
           <tr>--!>
		   <td width="72" height="40" valign="middle"><div class="banklogo"><input name="paytype" type="radio" value="992">
           <img src="/imgbank/bank/zfb.png" title="支付宝" alt="支付宝"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
		    
			<td><div class="banklogo"><input name="paytype" type="radio" value="1004">
	        <img src="/imgbank/bank/weixin.jpg" title="微信" alt="微信"  border="0" style="border:1px solid #CCCCCC;" /></div></td>
			
			<td><div class="banklogo"><input name="paytype" type="radio" value="993" />
            <img src="/imgbank/bank/cft.jpg" title="财富" alt="财富"  border="0" style="border:1px solid #CCCCCC;" /> </div></td>
	      </tr>   
	
</table>
	</li>
    </ul>
	 <div class="chongzhi3">
	<h3 style="    margin-top: 10px;"><input id="setcz" class="an" type="submit" value="进入儲值"><input type="reset" id="resetcz" class="an" value="重置"></h3>
 </div>
 </div>
	<input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</form>
      </table>
	  </td> 
  </tr>
    </tr>
    </table>
	 	<h3>儲值说明：</h3>
    <ul>
     <li>5、扫描后如30S未到账，请联系客服，告知您的儲值编号和您的儲值金额及你的银行用户姓名。</li>
         </ul>





<?php
} elseif($memberBank['bankId'] == 17) {
?>
<div class="content3 wjcont">
 <div class="title"><span></span></div>
 <div class="body">
<form action="/qwpay/Req.php" method="POST" target="_self">
     <div class="chongzhi3">
	 <h2></h2>
    <ul>
     <li><span>银行类型：</span><img src="/imgbank/zfb.png" width="155" /></li>
     <li><span>儲值编号：</span><?=$args[0]['rechargeId']?></li>
     <li><span>儲值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
    </ul>
    <div class="chongzhi3">
	<h3 style="    margin-top: 10px;"><input name="submit2" type='submit' style="width:130px; height:36px; margin-left:20%" class="btn btn-action" value="进入支付" /></h3>
 </div>
 </div>
	<input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="paytype" value="101" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</div>
</form>

         </ul>
 </div>
    </ul>

<?php
} elseif($memberBank['bankId'] == 16) {
?>
<div class="content3 wjcont">
 <div class="title"><span></span></div>
 <div class="body">
<form action="/qwpay/Req.php" method="POST" target="_self">
     <div class="chongzhi3">
	 <h2></h2>
    <ul>
     <li><span>银行类型：</span><img src="/imgbank/cft.jpg" width="155" /></li>
     <li><span>儲值编号：</span><?=$args[0]['rechargeId']?></li>
     <li><span>儲值金额：</span><?=$args[0]['amount']?>&nbsp元</li>
    </ul>
    <div class="chongzhi3">
	<h3 style="    margin-top: 10px;"><input name="submit2" type='submit' style="width:130px; height:36px; margin-left:20%" class="btn btn-action" value="进入支付" /></h3>
 </div>
 </div>
	<input type="hidden" name="orderid" value="<?= $args[0]['rechargeId'] ?>" />
	<input type="hidden" name="paytype" value="1006" />
	<input type="hidden" name="amount" value="<?= $args[0]['amount'] ?>" />
</div>
</form>
 
         </ul>
 </div>
    </ul>


<?
}else{
?>
<div class="content3 wjcont">
 <div class="title"><span>儲值信息</span></div>
 <div class="body">
 <div class="chongzhi1">
 	<h2>儲值信息：</h2>
    <ul>
     <li><span>银行类型：</span><b><?=$memberBank['bankName']?></b><strong><a href="<?=$memberBank['bankHome']?>" target="_blank">进入银行网站>></a></strong></li>
     <li><span>银行账号：</span><input type="text" id="bank-account" readonly value="<?=$memberBank["account"]?>" class="text4" />
     <em class="copy" for="bank-account" >
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="43" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	</em>
     </li>
     <li><span>账户名：</span><input type="text" id="bank-username" readonly value="<?=$memberBank["username"]?>" class="text4" />
     <em class="copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="43" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
	  </em>
     </li>
     <li><span>儲值金额：</span><input type="text" id="recharg-amount" readonly value="<?=$args[0]['amount']?>" class="text4" />
      <em class="copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="43" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </em>
     网银儲值金额必须与网站填写金额一致方能到账！</li>
     <li><span>儲值编号：</span><input type="text" id="username" readonly value="<?=$args[0]['rechargeId']?>" class="text4" />
     <em class="copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="43" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="43" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
    </em>
     每个儲值编号仅用于一笔儲值，重复使用将不能到账！</li>
    </ul>
     <em class="copy" for="username">
	<td height="40" colspan="4" align="center">
	<form name="alipaypay" method="post" accept-charset="gbk" target="_blank" onsubmit="document.charset='gbk'" action="https://shenghuo.alipay.com/send/payment/fill.htm">
	<input type="hidden" name="optEmail" value="<?=$memberBank['account']?>">
    <input type="hidden" name="payAmount" value="<?=$args[0]['amount']?>">
    <input type="hidden" name="title" value="<?=$this->user['username']?>">
    <input type="hidden" name="memo" value="<?=$args[0]['rechargeId']?>">
    <input type="hidden" name="isSend" value="">
    <input type="hidden" name="smsNo" value=""> 
	<input name="submit" type="submit" style="width:250px;" value="前往支付宝儲值(免填信息直充)" class="btn chazhao"/>
	 </form></td>
	 </tr>
 </div>
 <div class="chongzhi2">
 	<h3>儲值说明：</h3>
    <ul>
     <li>1、本站已与支付宝合作，直接点击前往支付宝儲值、无需再次输入帐号、备注信息；</li>
     <li>2、跳往支付宝儲值页面时，请会员再次核实金额、账户名是否符合；</li>
     <li>3、儲值金额与网友转账金额不符，儲值将无法到账；</li>
     <li>4、入款时间：早上 9：00 至次日凌晨 2：00
     <li>5、转账后如5分钟未到账，请联系客服，告知您的儲值编号和您的儲值金额及你的支付宝姓名。</li>
         </ul>
 </div>
  <div class="bank"></div>
  </div>
  <div class="foot"></div>
</div>
<?
}
?>