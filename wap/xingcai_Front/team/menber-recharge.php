<?php 
	$sql="select * from {$this->prename}members where uid=?";
	$userData=$this->getRow($sql, $args[0]);
?>
<div>
<form action="/index.php/team/userUpdateed2" target="ajax" method="post" call="userCoinSubmitCode" onajax="userCoinBeforeSubmitCode" dataType="html">
	<input type="hidden" name="uid" value="<?=$args[0]?>"/>

	<table cellpadding="2" cellspacing="2" class="form-tips" style="width:100%;margin-top: 5px;">
	    <tr>
			<td class="title" width="110">上級關係：</td>
			<td><?=$this->getValue("select username from {$this->prename}members where uid={$userData['parentId']} ")?> > <?=$userData['username']?></td>
		</tr>
		<tr>
			<td class="title">帳號名：</td>
			<td><?=$userData['username']?></td>
		</tr>
		<tr>
			<td class="title">帳號餘額：</td>
			<td><b style="color:blue"><?=$userData['coin']?></b></td>
		</tr>
		<tr>
			<td class="title">我的餘額：</td>
			<td><b style="color:#ff0000"><?=$this->user['coin']?></b></td>
		</tr>
		<tr>
			<td class="title">儲值數：</td>
			<td><p><input type="text" name="coin" value=""  style="width:100px;">&nbsp&nbsp儲值範圍:0～10000元</p></td>
		</tr>
		<tr>
			<td class="title">資金密碼：</td>
			<td><p><input type="password" name="safepass" value=""  style="width:243px;"></p></td>
		</tr>
	</table>
</form>
</div>