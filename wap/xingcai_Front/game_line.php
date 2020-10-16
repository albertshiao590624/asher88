<div class="warp lotteryBox">

<div class="lotteryBody">
        <div id="nfdprize-text" class="m-lott-methodBox">
            <span class="nfdprize_text" id="m-lott-listContent">玩法選擇<b class="cur"></b></span>
			
 
<div class="tz_work" style="float:right;">
	<div class="ball_write">
	 <div class="write_bg">
	  <div class="jiangjin" id="game-dom">

	  <div class="fandian-k fl" >
		  <input type="button" class="min" value="" step="-0.1"/>
		  <input type="button" class="max" value="" step="0.1"/>
		  <strong>獎金/返點：</strong>
		<span id="fandian-value" class="fdmoney" style=" color: #fff !important;"><?= $maxPl ?></span>

		  <div id="slider-range-min" class="tiao slider" value="<?= $this->ifs($_COOKIE['fanDian'], 0) ?>" data-bet-count="<?= $this->settings['betMaxCount'] ?>" data-bet-zj-amount="<?= $this->settings['betMaxZjAmount'] ?>" max="<?= $this->user['fanDian'] ?>" game-fan-dian="<?= $this->settings['fanDianMax'] ?>" fan-dian="<?= $this->user['fanDian'] ?>" game-fan-dian-bdw="<?= $this->settings['fanDianBdwMax'] ?>" fan-dian-bdw="<?= $this->user['fanDianBdw'] ?>" min="0" step="1" slideCallBack="gameSetFanDian"></div>
<style>

	
		#slider-range-min {
			width:100px;
			height:6px;
			background: #fff;
		}
		
		#slider-range-min .noUi-origin {
			background:#e43f3f; 
			height: initial !important;
			width: initial !important;
		}
	
		#slider-range-min .noUi-handle {
			left: -7px;
			width:14px;
			height:14px;
		}
	  </style>
		<script>
		var flag=false;
			slider=noUiSlider.create($("#slider-range-min")[0], {
				start: 0,
				animate: true,
				range: {
					min: 0,
					max: <?=$this->user['fanDian']?>
				},
			});
			slider.on('update',function(value){
				flag&&gameSetFanDian(parseFloat(value[0]));
				flag=true
			});
		  </script>
	  </div>
	  </div>
	 </div>
	</div>
</div>
			
        </div>
<div class="lotteryLeft" style="min-height: auto;margin-top: -2px;">
                     <div class="m-lott-methodBox-list" style="height: auto;/* display: none;*/"> 
                    <div class="lotteryGroup">
                        <ul id="groupList" style="width: 1004.18px;">
<?php
$check1 = $this->settings['checkLogin1'];
$check2 = $this->settings['checkLogin2'];
$this->getTypes();
$sql    = "select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
$groups = $this->getObject($sql, 'id', $this->types[$this->type]['type']);
if ($this->groupId && !$groups[$this->groupId])
    unset($this->groupId);
if ($groups)
    foreach ($groups as $key => $group) {
        if (!$this->groupId)
            $this->groupId = $group['id'];
?>
                       <li><a href="#" tourl="/index.php/index/group_new/<?= $this->type . '/' . $group['id'] ?>" <?= ($this->groupId == $group['id']) ? ' class="took"' : '' ?>     onclick="showx(<?= $group['id'] ?>)" ><?= $group['groupName'] ?></a></li>
					   <?php
    }
?>
					   
					   </ul>
             </div>	
</div>	
</div>	
</div>	
