  <?php $this->display('inc_daohang.php'); ?>
  <link rel="stylesheet" href="/css/nsc_m/m-lott.css?v=1.16.11.16">
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<!-- 中間部分開始 -->
 <section class="wraper-page">
		<div style="padding:0.714286rem ;">
    <div id="siderbar" style="display:none"></div>
    <div id="mainContent">

        <div id="contentBox">	
		 <div class="step">
		     <div class="item">
                        <div class="item_l">儲值處理時間：</div>
                        <div class="item_r"><span class="z_font1">7*24小時儲值服務</span></div>
                </div>
			<!-- 邏輯內容開始 -->
			<div data-init="content" class="content">
				<div class="wrapper">
					  
          
           
				  <div class="recharege-leibie">
             
                
                  <div class="recharege-lb">
				  <?php
				$sql="select * from {$this->prename}bank_list b, {$this->prename}sysadmin_bank m where m.admin=1 and m.enable=1 and b.isDelete=0 and b.id=m.bankId and b.id not in(3)";
				$banks=$this->getRows($sql);	
				if($banks){
				if($this->user['coinPassword']){
				?>
				  <form action="/index.php/cash/inRecharge" method="post" target="ajax" onajax="checkRecharge" call="toCash" dataType="html">
				<div class="item">
                        <div class="item_l">選擇儲值銀行：</div>
                        <div class="item_r">
                           	<select name="mBankId"  style="font-size: 20px;width:150px;margin-top: 5px;">
								<span><option value=''>點此選擇</option>
                            <?php
								$set=$this->getSystemSettings();
								if($banks) foreach($banks as $bank){
							?>
								<option value='<?=$bank['id']?>'><?=$bank['name']?></option>
							<?php } ?>
							</select>
                        </div>
                </div>
				<div class="item">
                        <div class="item_l money_hanggao">儲值金額(人民幣)：</div>
                        <div class="item_r">
                            <input name="amount" class="cz_input1" min="<?=$set['rechargeMin']?>" max="<?=$set['rechargeMax']?>" min1="<?=$set['rechargeMin1']?>" max1="<?=$set['rechargeMax1']?>" value="" id="ContentPlaceHolder1_txtMoney" onkeyup="showPaymentFee();">
                            <span class="yuan">元</span>
                            <p class="tips">單筆儲值限額：
							最低 <b id="m_min"><?=$set['rechargeMin']?></b>元，
							最高 <b id="m_max"><?=$set['rechargeMax']?></b>元</p>
                        </div>
                </div>
				  <div class="item">
                        <div class="item_l">儲值金額(大寫)：</div>
                        <div class="item_r">
						<span class="money" id="chineseMoney"></span>
						</div>
                </div>
				<div class="item">
                        <div class="item_l">驗證碼：</div>
                        <div class="item_r">
						 <input name="vcode" maxlength="4" type="text" class="text" style="width:75px;margin-top:5px;"/>
						 <img width="65" height="31" border="0" style="cursor:pointer;margin-bottom:5px;" id="vcode" alt="看不清？點擊更換" align="absmiddle" src="/index.php/user/vcode/<?= $this->time ?>" title="看不清楚，換一張圖片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/>
						</div>
                </div>
				   
				<div class="cz_btn_box">
                    <p>*平臺填寫金額應當與網銀匯款金額完全一致，否則將無法即時到賬！</p>
      
					<input id="setcz" class="next" type="submit" value="進入儲值" >
                </div>
                  </div>
                  </div> </div>
                  </div>
			<!-- 邏輯內容結束 -->
           	<!-- 中間部分結束 -->
           </form>
	    <?php }else{?>
     	<div id="subContent_bet_re">
		<div id="error">
		<h3>
			<font class="hint_red">您尚未設置資金密碼，請先設置資金密碼！</font>
		</h3>
		<div class="yhlb_back"><a href="/index.php/safe/passwd" target="_top">設置資金密碼</a></div>
						</div>

</div>	
    <?php }?>
         <?php }else{ ?>
	<div id="subContent_bet_re">
		<div id="error">
		<h3>
			<font class="hint_red">由於銀行網路原因，儲值暫停！給您帶來不便敬請諒解！</font>
		</h3>
		
						</div>

</div>	
            <?php }?>	
  </div> </div> </div> </div>
</body></html>
  
   

