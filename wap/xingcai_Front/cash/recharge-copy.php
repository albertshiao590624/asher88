<!--//複製程式 flash+js------end-->
<link rel="stylesheet" href="/css/nsc/chong-list.css" />
<?php
$this->freshSession();
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where b.isDelete=0 and mb.id=$mBankId and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
?>
<!--左邊欄body-->
<script type="text/javascript">
function test() {
           
			window.open("/koudai/getway.php");
            mDaoJiShi();
}
        //截止倒計時
        function mDaoJiShi() {
            document.getElementById("addmenber").value = "已提交";
            document.getElementById("addmenber").readOnly = true;
            document.getElementById("addmenber").disabled = true;
        }
</script>
    <script language="javascript">
      document.getElementById("frm1").submit();
    </script>
         

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>

    </tr>
     <tr height=25 class='table_b_tr_b'>
     
      <th scope="col" style="background: #FFFFFF;color: #888;font-size: 15px;border-bottom: 1px dashed #ddd;width: 50%;height: 50px;text-indent: 16px;">儲值金額：<?=$args[0]['amount']?></th>
      <th scope="col" style="background: #fff;height:50%;color: #888;border-bottom: 1px dashed #ddd;font-size: 15px;">儲值編號 ：<?=$args[0]['rechargeId']?></th>
   
    </tr>
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="right" class="copyss">
	<div id="subContent_bet_re">
	<div class="form_switch_main">
	  <form action="/koudai/getway.php" method="POST" name="a32" target="_blank" id="frm1">
	  
	   
	        <!--td width="72" height="40" valign="middle"-->
			<div class="form_switch_head">
			<div class="form_item clearfix">
	        <div class="switch_choose">
			<input type="radio" name="rbPayMType" id="utype1" value="10001" checked="checked" title="工商銀行">
			<label class="bk_l active1" for="utype1">工商銀行</label>
			<input type="radio" name="rbPayMType" id="utype2" value="10002" title="農業銀行">
			<label class="bk_r" for="utype2">農業銀行</label>
			<input type="radio" name="rbPayMType" id="utype3" value="10005" title="建設銀行">
			<label class="bk_r" for="utype3">建設銀行</label>
			<input type="radio" name="rbPayMType" id="utype4" value="10013" title="北京銀行">
			<label class="bk_r" for="utype4">北京銀行</label>
			<input type="radio" name="rbPayMType" id="utype5" value="10004" title="中國銀行">
			<label class="bk_r" for="utype5">中國銀行</label>
			<input type="radio" name="rbPayMType" id="utype6" value="10008" title="交通銀行">
			<label class="bk_r" for="utype6">交通銀行</label>
			<input type="radio" name="rbPayMType" id="utype7" value="10010" title="光大銀行">
			<label class="bk_r" for="utype7">光大銀行</label>
			<input type="radio" name="rbPayMType" id="utype8" value="10012" title="中國郵政">
			<label class="bk_r" for="utype8">中國郵政</label>
			<input type="radio" name="rbPayMType" id="utype9" value="10003" title="招商銀行">
			<label class="bk_r" for="utype9">招商銀行</label>
			<input type="radio" name="rbPayMType" id="utype10" value="10006" title="民生銀行">
			<label class="bk_r" for="utype10">民生銀行</label>
			<input type="radio" name="rbPayMType" id="utype11" value="10016" title="廣發銀行">
			<label class="bk_r" for="utype11">廣發銀行</label>
			<input type="radio" name="rbPayMType" id="utype13" value="10021" title="南京銀行">
			<label class="bk_r" for="utype13">南京銀行</label>
			<input type="radio" name="rbPayMType" id="utype14" value="10019" title="寧波銀行">
			<label class="bk_r" for="utype14">寧波銀行</label>
			<input type="radio" name="rbPayMType" id="utype15" value="10014" title="平安銀行">
			<label class="bk_r" for="utype15">平安銀行</label>
			<input type="radio" name="rbPayMType" id="utype16" value="10018" title="東亞銀行">
			<label class="bk_r" for="utype16">東亞銀行</label>
			<input type="radio" name="rbPayMType" id="utype18" value="10009" title="興業銀行">
			<label class="bk_r" for="utype18">興業銀行</label>
			<input type="radio" name="rbPayMType" id="utype20" value="10023" title="上海銀行">
			<label class="bk_r" for="utype20">上海銀行</label>
			<input type="radio" name="rbPayMType" id="utype21" value="10007" title="中信銀行">
			<label class="bk_r" for="utype21">中信銀行</label>
			<input type="radio" name="rbPayMType" id="utype22" value="10025" title="華夏銀行">
			<label class="bk_r" for="utype22">華夏銀行</label>
			<input type="radio" name="rbPayMType" id="utype23" value="10017" title="渤海銀行">
			<label class="bk_r" for="utype23">渤海銀行</label>
			<input type="radio" name="rbPayMType" id="utype24" value="10022" title="浙商銀行">
			<label class="bk_r" for="utype24">浙商銀行</label>
			<input type="radio" name="rbPayMType" id="utype19" value="10011" title="深圳發展銀行">
			<label class="bk_r" for="utype19">深圳發展銀行</label>
			<input type="radio" name="rbPayMType" id="utype12" value="10020" title="北京農村商業銀行">
			<label class="bk_r" for="utype12">北京農村商業銀行</label>
			<input type="radio" name="rbPayMType" id="utype17" value="10015" title="上海浦東發展銀行">
			<label class="bk_r" for="utype17">上海浦東發展銀行</label>
			
			</div>
	</div>
			<div class="form_submit_box">
	<input class="button" id="addmenber" onclick="test()" type="submit" value="進入支付">
	<div class="form_submit_box1">
	<input class="button1" type="reset" onclick="window.location.reload();" value="返回">
	<input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
	<input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
	<input name="Bankco" type="hidden" value="1" />
	<input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
	<p id="linkTip" style="color:#f00; margin-top:5px; position:absolute; top:100px;">*注意：線上儲值付款成功後，請等待30s後再關閉儲值的視窗，以防資金不到賬。若付款後未到賬，請聯繫客服。</p>
</div>
</div>
</form>
</div>

<script type="text/javascript">
		//radio選擇樣式
        $(".switch_choose input[type=radio]").click(function(){
	        if($(".switch_choose input[type=radio]:checked").val()){
	       		$(this).next('label').addClass('active1').siblings().removeClass('active1');
	       	}
        })
</script>
 <!--左邊欄body結束-----------------------支付寶------------------------------------------------------------->
<?
}else if($memberBank['bankId']==2){
?>
<!--左邊欄body-->
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
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">1.選擇銀行並輸入金額</th>
                  <th scope="col" style="background: #f5f5f5;height:55px;color: #35aaff;font-size: 15px;border:1px solid #e9e9e9">2.確認儲值資訊</th>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">3.完成儲值</th>

                  </tr>
                  </table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲數值型別：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金額：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值編號：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/koudai/getway.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="確認支付">
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    <input name="Bankco" type="hidden" value="2" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />

    </tr>
    </table>
</form>
</td>
</tr>
</table>
 <!--左邊欄body結束-------------------------------------------支付寶結束--------------------------------------------------------->
 
 <!---------------------------------------------財付通--------------------------------------------------------->
<? }else if($memberBank['bankId']==3){
?>
<!--左邊欄body-->
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
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">1.選擇銀行並輸入金額</th>
                  <th scope="col" style="background: #f5f5f5;height:55px;color: #35aaff;font-size: 15px;border:1px solid #e9e9e9">2.確認儲值資訊</th>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">3.完成儲值</th>

                  </tr>
                  </table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲數值型別：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金額：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值編號：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/koudai/getway.php" method="post" name="a" target="_blank" > 
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="確認支付">
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
 <!---------------------------------------------財付通結束--------------------------------------------------------->
 <!---------------------------------------------支付寶手動支付--------------------------------------------------------->
 <? }else if($memberBank['bankId']==22){
?>
<style type="text/css">
	img{
		width: 100%;
	}
</style>
<div class="Contentbox">
		<div class="p_con" id="playinfo_0">
<h2>儲數值型別：<?=$memberBank['bankName']?></h2>
<h2>收款戶名：<?=$memberBank["username"]?></h2>
<h2>收款帳號：<?=$memberBank["account"]?></h2>
<h2>儲值金額：<?=$args[0]['amount']?></h2>
<h2>儲值編號：<?=$args[0]['rechargeId']?></h2>
<p>長按以下二維碼保存圖片進入支付寶掃一掃儲值<br>
手機app請截圖掃描<br>
<br>
&nbsp;<img src="<?=$memberBank["qrCode"]?>" alt=""></p>

<p><font color="#FF0000">1.每次"儲值編號"均不相同,務必將"儲值編號"正確複製填寫到引號匯款頁面的"留言"欄目中;</font><br>
2.二維碼不固定，轉帳前請仔細核對該帳號;<br>
3.儲值金額與轉帳金額不符，儲值將無法到賬;<br>
4.轉帳後如10分鐘未到賬，請聯繫客服，告知您的儲值編號和您的儲值金額。<br>
5.支付寶，微信，財付通，手動儲值可忽略以上幾點。</p>
</div>
</div>
<!---------------------------------------------微信手動支付--------------------------------------------------------->
 <? }else if($memberBank['bankId']==21){
?>
<style type="text/css">
	img{
		width: 100%;
	}
</style>
<div class="Contentbox">
		<div class="p_con" id="playinfo_0">
<h2>儲數值型別：<?=$memberBank['bankName']?></h2>
<h2>收款戶名：<?=$memberBank["username"]?></h2>
<h2>收款帳號：<?=$memberBank["account"]?></h2>
<h2>儲值金額：<?=$args[0]['amount']?></h2>
<h2>儲值編號：<?=$args[0]['rechargeId']?></h2>
<p>長按以下二維碼保存圖片進入微信掃一掃儲值<br>
手機app請截圖掃描<br>
<br>
&nbsp;<img src="<?=$memberBank["qrCode"]?>" alt=""></p>

<p><font color="#FF0000">1.每次"儲值編號"均不相同,務必將"儲值編號"正確複製填寫到引號匯款頁面的"留言"欄目中;</font><br>
2.二維碼不固定，轉帳前請仔細核對該帳號;<br>
3.儲值金額與轉帳金額不符，儲值將無法到賬;<br>
4.轉帳後如10分鐘未到賬，請聯繫客服，告知您的儲值編號和您的儲值金額。<br>
5.支付寶，微信，財付通，手動儲值可忽略以上幾點。</p>
</div>
</div>

  <!---------------------------------------------微信支付--------------------------------------------------------->
<? }else if($memberBank['bankId']==20){
?>
<!--左邊欄body-->
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
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">1.選擇銀行並輸入金額</th>
                  <th scope="col" style="background: #f5f5f5;height:55px;color: #35aaff;font-size: 15px;border:1px solid #e9e9e9">2.確認儲值資訊</th>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">3.完成儲值</th>

                  </tr>
                  </table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr height=25 class='table_b_tr_b' >
    
	<th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲數值型別：<img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值金額：<?=$args[0]['amount']?></th>
    <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">儲值編號：<?=$args[0]['rechargeId']?></th>
    </tr>
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class="table_b">    
	<tbody><tr height="25" class="table_b_tr_h">
    <td colspan="2" align="center" class="copyss">
	<form action="/koudai/getway.php" method="post" name="a" target="_blank" >
	<input name="submit" type="submit" style="margin-top: 50px;" class="button" value="確認支付">	
    <input name="p2_Order" type="hidden" value="<?=$args[0]['rechargeId']?>" />
    <input name="p3_Amt" type="hidden" value="<?=$args[0]['amount']?>" />
    <input name="Bankco" type="hidden" value="21" />
    <input name="pa_MP" type="hidden" value="<?=$this->user['username']?>" />
    </tr>
    </table>
</form>
</td>
</tr>
</table>
 <!---------------------------------------------微信支付結束--------------------------------------------------------->
 
 
 
<? }else{
?>
<!--左邊欄body-->
 <table width="100%" height="55" align="center">
                  <tr>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">1.選擇銀行並輸入金額</th>
                  <th scope="col" style="background: #f5f5f5;height:55px;color: #35aaff;font-size: 15px;border:1px solid #e9e9e9">2.確認儲值資訊</th>
                  <th scope="col" style="background: #fff;height:55px;color: #000;font-size: 15px;border:1px solid #e9e9e9">3.完成儲值</th>

                  </tr>
                  </table>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>儲值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">儲值銀行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
            <a id="bank-link" target="_blank" href="<?=$memberBank['bankHome']?>" class="spn11" style="margin-left:50px;">進入銀行網站>></a>
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款戶名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" />
	 <button class="layui-btn layui-btn-normal" type="button" onClick="copyUrl1()" >複製</button></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款帳號：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>" />
	 <button class="layui-btn layui-btn-normal" type="button" onClick="copyUrl2()" >複製</button>
	  </td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">儲值金額：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始圖元顯示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class="spn12" style="display:inline;">*網銀儲值金額必須與網站填寫金額一致方能到賬！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">儲值編號：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始圖元顯示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class="spn12"  style="display:inline;">*網銀儲值請務必將此編號填寫到匯款“附言”裡，每個儲值編號僅用於一筆儲值，重複使用將不能到賬！</div>
	   </td> 
    </tr>
<!--左邊欄body結束-->
<?php if($memberBank["rechargeDemo"]){?>
   <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left" > <div class="example">儲值圖示：<div class="example2" rel="<?=$memberBank["rechargeDemo"]?>">查看</div></div></td> 
  </tr>
<? }?>
<tr>
<div class="tips">
	<dl>
        <dt>儲值說明：</dt>
        <dd>1.每次"儲值編號"均不相同,務必將"儲值編號"正確複製填寫到引號匯款頁面的"附言"欄目中;</dd>
        <dd>2.帳號不固定，轉帳前請仔細核對該帳號;</dd>
        <dd>3.儲值金額與網友轉帳金額不符，儲值將無法到賬;</dd>
        <dd>4.轉帳後如10分鐘未到賬，請聯繫客服，告知您的儲值編號和您的儲值金額及你的銀行用戶姓名。</dd>
    </dl>
</div>
</tr>
</table> 
<?php }?>
<script language="JavaScript">

function xingcai(tips) {			
	 layer.open({
		zIndex:1999,
		content: tips,
		timeout: 2,
		onyes: true,
		btn:"確定"
	});
		
}
//重慶彩連結1
function copyUrl1(){
var Url2=document.getElementById("bank-username");
Url2.select();
document.execCommand("Copy");
alert("收款戶名已複製。");
}
//重慶彩連結2
function copyUrl2(){
var Url2=document.getElementById("bank-account");
Url2.select();
document.execCommand("Copy");
alert("收款帳號已複製。");
}
</script>
