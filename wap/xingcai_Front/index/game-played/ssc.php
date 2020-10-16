<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<?php foreach(array('万','千','百','十','个') as $var){ ?>
<div class="pp" action="tzAllSelect" length="5" random="sscRandom">
	<div class="title"><?=$var?>位</div>
	&nbsp;
	<input type="button" value="0" class="code min s" />
	<input type="button" value="1" class="code min d" />
	<input type="button" value="2" class="code min s" />
	<input type="button" value="3" class="code min d" />
	<input type="button" value="4" class="code min s" />
	<input type="button" value="5" class="code max d" />
	<input type="button" value="6" class="code max s" />
	<input type="button" value="7" class="code max d" />
	<input type="button" value="8" class="code max s" />
	<input type="button" value="9" class="code max d" />
    
	<input type="button" value="10" class="code s min" />
	<input type="button" value="11" class="code d max" />
	<input type="button" value="12" class="code s max" />
	<input type="button" value="13" class="code d max" />
	<input type="button" value="14" class="code s max" />
	<input type="button" value="15" class="code d max" />
	<input type="button" value="16" class="code s max" />
	<input type="button" value="17" class="code d max" />
	<input type="button" value="18" class="code s max" />
	<input type="button" value="19" class="code d max" />
	<input type="button" value="20" class="code s max" />
    <input type="button" value="21" class="code d min" />
	<input type="button" value="22" class="code s min" />
	<input type="button" value="23" class="code d min" />
	<input type="button" value="24" class="code s min" />
	<input type="button" value="25" class="code d min" />
	<input type="button" value="26" class="code s min" />
	<input type="button" value="27" class="code d min" />
	<input type="button" value="28" class="code s min" />
	<input type="button" value="29" class="code d min" />
	<input type="button" value="30" class="code s min" />
	<input type="button" value="31" class="code d max" />
	<input type="button" value="32" class="code s max" />
	<input type="button" value="33" class="code d max" />
	<input type="button" value="34" class="code s max" />
	<input type="button" value="35" class="code d max" />
	<input type="button" value="36" class="code s max" />
	<input type="button" value="37" class="code d max" />
	<input type="button" value="38" class="code s max" />
	<input type="button" value="39" class="code d max" />
	

	<div class="clearfix"></div>
	
	<input type="button" value="清" class="action none" />
    <input type="button" value="双" class="action even" />
    <input type="button" value="单" class="action odd" />
    <input type="button" value="小" class="action small" />
    <input type="button" value="大" class="action large" />
    <input type="button" value="全" class="action all" />
</div>
<?php
	}
	
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>
