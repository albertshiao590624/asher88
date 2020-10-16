   <?php $this->display('inc_daohang.php'); ?>

 <?php $this->freshSession(); 
		//更新級別
		$ngrade=$this->getValue("select max(level) from {$this->prename}member_level where minScore <= {$this->user['scoreTotal']}");
		if($ngrade>$this->user['grade']){
			$sql="update blast_members set grade={$ngrade} where uid=?";
			$this->update($sql, $this->user['uid']);
		}else{$ngrade=$this->user['grade'];}
		
		$date=strtotime('00:00:00');
?>
<link rel="stylesheet" href="/css/nsc_m/list.css?v=1.16.11.16">
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.12.4"></script>
				 <script type="text/javascript">
			function beforeToCash(){
				if(!this.amount.value) throw('請填寫提現金額');
				if(!this.amount.value.match(/^[0-9]*[1-9][0-9]*$/)) throw('提現金額錯誤');
				showPaymentFee()
				var amount=parseInt(this.amount.value);
				if($('input[name=bankId]').val()==2||$('input[name=bankId]').val()==3){
					if(amount<parseFloat(<?=json_encode($this->settings['cashMin1'])?>)) throw('支付寶/財付通提現最小限額為<?=$this->settings['cashMin1']?>元');
					if(amount>parseFloat(<?=json_encode($this->settings['cashMax1'])?>)) throw('支付寶/財付通提現最大限額為<?=$this->settings['cashMax1']?>元');
					showPaymentFee()
				}else{
					if(amount<parseFloat(<?=json_encode($this->settings['cashMin'])?>)) throw('提現最小限額為<?=$this->settings['cashMin']?>元');
					if(amount>parseFloat(<?=json_encode($this->settings['cashMax'])?>)) throw('提現最大限額為<?=$this->settings['cashMax']?>元');
					showPaymentFee()
				}
				if(!this.coinpwd.value) throw('請輸入提款密碼');
				if(this.coinpwd.value<6) throw('提款密碼至少6位元');
				showPaymentFee()
			}
			function toCash(err, data){
	if(err){
		xingcai(err)
	}else{
		$(':password').val('');
		$('input[name=amount]').val('');
		xingcai('申請提現成功，提現將在10分鐘內到帳，如未到賬請聯繫線上客服。')
	}
}
			</script>
 <section class="wraper-page">
 	<?php
	$bank=$this->getRow("select m.*,b.logo logo, b.name bankName from {$this->prename}member_bank m, {$this->prename}bank_list b where b.isDelete=0 and m.bankId=b.id and m.uid=? limit 1", $this->user['uid']);
?>			
<?php if($bank['bankId']){?>
       <form action="/index.php/cash/ajaxToCash" method="post" target="ajax" datatype="json" onajax="beforeToCash" call="toCash">
                    <span class="tab-front" id="general_tab_1">
                     <span id="notice2" style="color:red"> 
                    </span>
                    </span><!--
                    <span class="tab-back"  id="general_tab_0">
                      <span class="menu_01"></span>
                      <span class="menu_02" onclick="window.location.href='?controller=security&action=withdraw&check=651'">向上級提現</span>
                      <span class="menu_03"></span>
                    </span>
            -->
            <!--第一步-->
            <div class="dw_main1">
                	<li class="recharege-leibie"></li>
				
                <!--div class="warning">注意：每天限制提款<span>10</span>次，您已提款<span class="orange">0</span>次，提款時間為 02:01 至 02:00</div-->
                <table border="0" cellspacing="0" cellpadding="0" class="dw_list_table">
                <tbody><tr>
                <th><span class="x_line">帳號名：</span></th>
                <td><span class="dw_name"><?=$this->user['username']?></span></td>
                </tr>
                <tr>
                <th><span class="x_line">可提款金額：</span></th>
                <td><span class="dw_amount orange"><?=$this->user['coin']?></span></td>
                </tr>
                <tr>
                <th><span class="x_line2">提款金額：</span></th>
                <td><div class="input_kuang1"><input type="text" name="amount" id="ContentPlaceHolder1_txtMoney" onkeyup="showPaymentFee();" placeholder="請輸入提款金額"></div><p class="db_tips_txt">單筆最低提現金額：<?=$this->settings['cashMin']?>元，最高：<?=$this->settings['cashMax']?>元</p></td>
                </tr>
				 <tr>
                <th><span class="x_line2">提款密碼：</span></th>
                <td><div class="input_kuang1"><input name="coinpwd" type="password" placeholder="請輸入提款金額"></div></td>
                </tr>
                <tr>
                <th><span class="x_line2">收款銀行卡：</span></th>
                <td>
                    <select name="bankinfo" id="bankinfo" class="input_kuang1">
					<option selected="selected" value="365863"><?=$bank['bankName']?>--<?=preg_replace('/^(\w{4}).*(\w{4})$/', '\1***********\2', htmlspecialchars($bank['account']))?></option>
				</select>
                </td>
                </tr>
                </tbody>
				</table>
              <div class="submit_area"><input type="button" id="put_button_pass" value="提交申請" class="btn btn_orange formNext" onclick="$(this).closest('form').submit()">
              <!-- <a class="btn_sqlist orange" href="./?controller=report&action=main&tag=bankreport" target="_blank" title="充提記錄">提款申請清單</a> -->
              </div> 
            </div>
            </form>
			  <?php
	$bank=$this->getRow("select m.*,b.logo logo, b.name bankName from {$this->prename}member_bank m, {$this->prename}bank_list b where b.isDelete=0 and m.bankId=b.id and m.uid=? limit 1", $this->user['uid']);
	$this->freshSession(); 
    $date=strtotime('00:00:00');
	$date2=strtotime('00:00:00');
	$time=strtotime(date('Y-m-d', $this->time));
	$cashAmout=0;
		$rechargeAmount=0;
		$rechargeTime=strtotime('00:00');
		if($this->settings['cashMinAmount']){
			$cashMinAmount=$this->settings['cashMinAmount']/100;
			$gRs=$this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=".$rechargeTime);
			if($gRs){
				$rechargeAmount=$gRs["rechargeAmount"];
			}
		}
	$cashAmout=$this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where isDelete=0 and actionTime>={$rechargeTime} and uid={$this->user['uid']}");
	$times=$this->getValue("select count(*) from {$this->prename}member_cash where actionTime>=$time and uid=?", $this->user['uid']);
?>

   		<?php }else{?>
     	<div id="subContent_bet_re">
		<div id="error">
		<h3>
			<font class="hint_red">您尚未綁定銀行卡，請先進行卡號綁定！</font>
		</h3>
		<div class="yhlb_back"><a href="/index.php/safe/info" target="_top">卡號綁定頁面</a></div>
						</div>

</div>	
    <?php }?>
	 
        </section>
