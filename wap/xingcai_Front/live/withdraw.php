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
	.benkinfo tr{
		

		margin-top: 10px;
	}
</style>
</head>
<body>
<div class="pay">
	<!--主内容开始编辑-->
	<div class="tr_recharge">
		<div class="tr_rechtext">
			<p class="te_retit"><img src="/HUI/images/coin.png" alt="" />提现中心</p>
			<p>1.提现3至5分钟内到账，如遇延时请联系客服。</p>
			<p>2.提现过程中有疑问请联系客服协助解决。</p>
			
		</div>
		<?php if($args[0] == null){ ?>
		<form action="" class="am-form" id="doc-vld-msg">
			<!-- 新增银行卡页 -->
					<div class="center">
						<p class="te_retit">请完善银行卡信息</p>
						<table class="table">
							<tr>
								<td>选择银行:</td>
								<td>
								<select id="bankName" class="selectbox gray">
                           	<?php
							$data=$this->getRows("select * from {$this->prename}bank_list where isDelete=0 order by sort asc");
							foreach($data as $var){
                           	?>
								<option value="<?=$var['id']?>"><?=$var['name']?></option>
                             <?php }?>
							</select>
								</td>
							</tr>
							<tr>
								<td>银行卡号:</td>
								<td><input type="text" id="account" ></td>
							</tr>
							<tr>
								<td>持卡人:</td>
								<td><input type="text" id="name" ></td>
							</tr>
							<tr>
								<td>开户网点:</td>
								<td><input type="text" id="counName" ></td>
							</tr>

						</table>
					</div>
	    </form>
					<div class="center">	
					<input type="button" onclick="subBankInfo()" value="新增银行卡" class="tr_pay am-btn auto" />
				</div>	
			<!-- 新增银行卡结束 -->
				<?php }else{  ?>
				<!-- 提现表单 -->
				<form action="" class="am-form" id="withdrawMoney">
					<div class="center">

						<table class="benkinfo">
						</br>
							<tr>
								<td>金额:</td>
								<td><input type="number"  value="" id="amount"></td>
							</tr>

							<tr>
								<td>提款密码:</td>
								<td><input type="password"   value="" id="coinpwd"></td>
							</tr>

							<tr>
								<td>银行卡:</td>
								<td><input type="text" readonly="readonly" value="<?=$args[0]['account']?>" id="account"></td>
							</tr>
							
						</table>
					
					</div>
					</form>
					<!-- 提现结束 -->
					<div class="center">
					<input type="button" onclick="subwithdraw()" value="申请提现"  class="tr_pay am-btn auto" />
					</div>
				<?php }?>

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
		console.log('click', index, item.text())
	}
	uc_01.change = function(index, item) {
		console.log('change', index, item.text())
	}
	$(function() {
		$('#uc_01 li:eq(3)').click(function() {
			$('.tr_rechoth').show();
			$('.tr_rechoth').find("input").attr('required', 'true')
			$('.rechnum').text('100.00元');
		})
		$('#uc_01 li:eq(0)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('100.00元');
			$('.othbox').val('100');
		})
		$('#uc_01 li:eq(1)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('200.00元');
			$('.othbox').val('200');
		})
		$('#uc_01 li:eq(2)').click(function() {
			$('.tr_rechoth').hide();
			$('.rechnum').text('500.00元');
			$('.othbox').val('500');
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