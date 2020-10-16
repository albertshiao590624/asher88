<?php $this->display('inc_daohang1.php'); ?>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript">
function recordSearch(err, data){
	if(err){
		xingcai(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
   <section class="wraper-page">
<div class="ibox-title">
                        <h5>投注記錄 <small></small></h5>
                        
                    </div>
    <form action="/index.php/record/searchGameRecord/<?=$this->userType?>" dataType="html" call="recordSearch" target="ajax">
      <div class="input-daterange input-group" >
                                <input type="text" class="input-sm form-control" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="startTime">
                                <span class="input-group-addon">到</span>
                                <input type="text" class="input-sm form-control" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" name="toTime" id="endTime">
                            </div>
        <div id="searchBox" class="re">
        	<div class="input-append input-group" "="">					
			<span class="input-group-btn">	
			<button class="btn btn-white" type="button">彩種名稱</button>	
			</span>				
			 <select class="input-large form-control" name="type">
                 <option value="0" <?=$this->iff($_REQUEST['type']=='', 'selected="selected"')?>>全部彩種</option>
            <?php
                if($this->types) foreach($this->types as $var){ 
                    if($var['enable']){
            ?>
            <option value="<?=$var['id']?>" <?=$this->iff($_REQUEST['type']==$var['id'], 'selected="selected"')?>><?=$this->iff($var['shortName'], $var['shortName'], $var['title'])?></option>

            <?php }} ?>
        </select>
			</div>
          <div class="input-append input-group" "="">					
			<span class="input-group-btn">				
			 
			<button class="btn btn-white" type="button">彩種狀態</button>	
			</span>				
			 <select class="input-large form-control" name="state">
               <option value="0" selected>所有狀態</option>
            <option value="1">已派獎</option>
            <option value="2">未中獎</option>
            <option value="3">未開獎</option>
            <option value="4">追號</option>
            <option value="5">撤單</option>
        </select>
			</div>
          
        </div>
		<div class="search_br">
		 <input type="submit" class="btn btn-primary btn-sm" value="查詢"></input>
        <!--div class="search_br"><input type="button" value="查詢" class="formCheck chazhao" /></div-->
		</div>
    </form>
<style type="text/css">
.search_br {padding-top:10px;height:45px;text-align: center;color: #666;}
</style> 
<div class="display biao-cont">
<?php $this->display('record/search-list.php'); ?>
 </div>
