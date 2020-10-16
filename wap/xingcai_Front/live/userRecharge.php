<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户儲值页面</title>

<link rel="stylesheet" type="text/css" href="/HUI/css/amazeui.min.css" />
<link rel="stylesheet" type="text/css" href="/HUI/css/main.css" />
<style type="text/css">
	.center{
		text-align: center;
	}
</style>
</head>
<body>
<div class="pay">
	<!--主内容开始编辑-->
	<div class="tr_recharge">
		<div class="tr_rechtext">
			<p class="te_retit"><img src="/HUI/images/coin.png" alt="" />儲值中心</p>
			<p>1.建议选择银行转账，可以使用支付宝或者微信，直接转账到公司银行卡，微信如遇零钱限额可在最后支付页面选择通过银行卡支付，支付宝遇到零钱限额可选择把钱存入余额宝支付或通过银行卡支付，（通过微信，支付宝转账公司银行卡，次次冲，次次加送1%，本优惠包含网银转账和手机银行转账）
</p>
			<p>2.微信支付宝扫码渠道不稳定，容易风控限额，建议第一时间换成使用微信支付宝转账公司银行卡，具体操作流程在优惠活动中有介绍，也可咨询联系客服协助解决。</p>
			<p>3.正常儲值1-3分钟到账，如遇延时，请联系客服协助解决。</p>
		</div>
		<form action="#" class="am-form" id="doc-vld-msg" >
			<div class="tr_rechbox">
				<div class="tr_rechhead">
					<img src="/HUI/images/ys_head2.jpg" />
					<p>儲值帐号：
						<a><?=$this->user['username']?></a>
					</p>
					
				</div>
				<div class="tr_rechli am-form-group" style="display:block;">
					<ul class="ui-choose am-form-group" id="uc_01">
						<li>
							<label class="am-radio-inline">
									<input type="radio"  value="200" name="docVlGender" required data-validation-message="请选择一项儲值额度"> 200
								</label>
						</li>
						<li>
							<label class="am-radio-inline">
									<input type="radio" value="1000" name="docVlGender" data-validation-message="请选择一项儲值额度"> 1000
								</label>
						</li>

						<li>
							<label class="am-radio-inline">
									<input type="radio" value="10000" name="docVlGender" data-validation-message="请选择一项儲值额度"> 10000
								</label>
						</li>
						<li>
							<label class="am-radio-inline">
									<input type="radio" value="coins" name="docVlGender" data-validation-message="请选择一项儲值额度"> 其他金额
								</label>
						</li>
					</ul>
					<!--<span>1招兵币=1元 10元起充</span>-->
				</div>
				<div class="tr_rechoth am-form-group">
					<span>其他金额：</span>
					<input type="number" min="200" max="10000" name="docVlGender" value="200.00元" class="othbox" data-validation-message="儲值金额范围：200-10000元" />
					<!--<p>儲值金额范围：10-10000元</p>-->
				</div>
				<div class="tr_rechcho am-form-group">
					<span>儲值方式：</span>

					<?php  foreach ($args[0] as $key => $value) { ?>
						

					<label class="am-radio">
							<input type="radio" class='bank' name="bankId" value="<?=$value['id']?>" data-am-ucheck required data-validation-message="请选择一种儲值方式"><img src="<?=$value['bankLogo']?>">
					</label>

					<?php }?>
					<!-- <label class="am-radio" style="margin-right:30px;">
							<input type="radio" name="radio1" value="" data-am-ucheck data-validation-message="请选择一种儲值方式"><img src="/HUI/images/zfbpay.png">
					</label> -->
				</div>
				<div class="tr_rechnum">
					<span>应付金额：</span>
					<p class="rechnum">0.00元</p>
				</div>
			</div>
			<div class="tr_paybox">
				<input type="button" value="确认支付" onclick="rechargedo()" class="tr_pay am-btn" />
				<span>温馨提示：选择手动儲值时儲值会有延时。</span>
			</div>
		</form>
	</div>

		<div class="tr_recharge1" style="display: none;" >
		<div class="tr_rechtext">
			<p class="te_retit"><img src="/HUI/images/coin.png" alt="" />儲值中心</p>
			<p>1.建议选择银行转账，可以使用支付宝或者微信，直接转账到公司银行卡，微信如遇零钱限额可在最后支付页面选择通过银行卡支付，支付宝遇到零钱限额可选择把钱存入余额宝支付或通过银行卡支付，（通过微信，支付宝转账公司银行卡，次次冲，次次加送1%，本优惠包含网银转账和手机银行转账）</p>
			<p>2.微信支付宝扫码渠道不稳定，容易风控限额，建议第一时间换成使用微信支付宝转账公司银行卡，具体操作流程在优惠活动中有介绍，也可咨询联系客服协助解决。</p>
			<p>3.正常儲值1-3分钟到账，如遇延时，请联系客服协助解决。</p>
		</div>
		<form action="" class="am-form" id="doc-vld-msg">
			<div class="tr_rechbox">
				<div class="tr_rechhead">
					<img src="/HUI/images/ys_head2.jpg" />
					<p>儲值帐号：
						<a><?=$this->user['username']?></a>
					</p>
					 
				</div>
				
			<!-- 二维码区域 -->
					<div class="center er">
						<!-- <div>
							<span>{$bankinfo.bankName}</span>
						</div> -->
						<div class="center">
							<img src="" id="qrcode" class="" style="width:100%;">
						</div>
					</div>
			<!-- 二维码区域结束 -->
				
					<div class="center ka ">

						<table class="">
							<tr>
								<td>银行:</td>
								<td class="bankName"></td>
							</tr>
							<tr>
								<td>卡号:</td>
								<td class="account"></td>
							</tr>
							<tr>
								<td>姓名:</td>
								<td class="address"></td>
							</tr>
						</table>
					
					</div>
			</div>
			<div class="tr_paybox center">
				<input type="button" onclick="payend()" value="支付完成" class="tr_pay am-btn auto" />
			</div>
		</form>
	</div>


</div>

<script type="text/javascript" src="/HUI/js/jquery.min.js"></script>
<script type="text/javascript" src="/HUI/js/amazeui.min.js"></script>
<script type="text/javascript" src="/HUI/js/ui-choose.js"></script>

<script src="/HUI/js/function.js"></script>
<script src="/HUI/js/layer.js"></script>
<script src="/QQ2617674/js/function.js"></script>
<script type="text/javascript">
	// 将所有.ui-choose实例化
	$('.ui-choose').ui_choose();
	// uc_01 ul 单选
	var uc_01 = $('#uc_01').data('ui-choose'); // 取回已实例化的对象
	uc_01.click = function(index, item) {
	}
	uc_01.change = function(index, item) {
	}
	$(function() {
		$('#uc_01 li:eq(3)').click(function() {
			$('.tr_rechoth').show();
			$('.tr_rechoth').find("input").attr('required', 'true')
			$('.rechnum').text('10000.00元');
		})
		$('#uc_01 li:eq(0)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('200.00元');
			$('.othbox').val('200');
		})
		$('#uc_01 li:eq(1)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('1000.00元');
			$('.othbox').val('1000');
		})
		$('#uc_01 li:eq(2)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('10000.00元');
			$('.othbox').val('10000');
		})
		$(document).ready(function() {
			$('.othbox').on('input propertychange', function() {
				var num = $(this).val();
				$('.rechnum').html(num + ".00元");
			});
		});
	})

	$(function() {
		$('#doc-vld-msg').validator({
			onValid: function(validity) {
				$(validity.field).closest('.am-form-group').find('.am-alert').hide();
			},
			onInValid: function(validity) {
				var $field = $(validity.field);
				var $group = $field.closest('.am-form-group');
				var $alert = $group.find('.am-alert');
				// 使用自定义的提示信息 或 插件内置的提示信息
				var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

				if(!$alert.length) {
					$alert = $('<div class="am-alert am-alert-danger"></div>').hide().
					appendTo($group);
				}
				$alert.html(msg).show();
			}
		});
	});
</script>
<div style="text-align:center;">

</div>
</body>
</html>