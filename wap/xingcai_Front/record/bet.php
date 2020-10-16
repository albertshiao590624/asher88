<?php 
		$this->getSystemSettings();
		if($this->settings['tzjl']){?>
		<div class="touzhu-true">
			<table width="100%">
				<thead>
					<tr>
					    <td>單號</td><td>投注時間</td><td>彩種</td><td>玩法</td><td>期號</td><td>投注號碼</td><td>倍數</td><td>模式</td><td>金額(元)</td><td>獎金(元)</td>
						<td>操作</td>
					</tr>
				</thead>
				<tbody id="order-history"><?php $this->display('index/inc_game_order_history.php'); ?></tbody>
				<?}?>
			</table>
		</div>
