<?php $this->display('inc_daohang1.php'); ?>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript">
function searchCoinLog(err, data){
	if(err){
		xingcai(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
   <section class="wraper-page">
<div class="ibox-title">
        <h5>帳變記錄 <small></small></h5>
                        
</div>
    <form action="/index.php/report/coinlog/<?=$this->type?>" dataType="html" target="ajax" call="searchCoinLog">
      
      <div class="input-daterange input-group" style="PADDING-TOP: 6;">
        <input type="text" class="input-sm form-control" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="startTime">
            <span class="input-group-addon">到</span>
        <input type="text" class="input-sm form-control" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" name="toTime" id="endTime">
    </div>
        <div id="searchBox" class="re">
        	<div class="input-append input-group" >					
			<span class="input-group-btn">	
			<button class="btn btn-white" >帳變類型</button>	
			</span>				
			 <select class="input-large form-control" id="methodid"  name="liqType">
              <option value="">所有帳變類型</option>
            <option value="1">帳戶儲值</option>
            <option value="2">遊戲返點</option>
            <option value="6">獎金派送</option>
            <option value="7">撤單返款</option>
            <option value="106">帳戶提現</option>
            <option value="8">提現失敗</option>
            <option value="107">提現成功</option>
            <option value="9">系統儲值</option>
            <option value="51">活動禮金</option>
            <option value="53">消費傭金</option>
            <option value="101">投注扣款</option>
            <option value="102">追號扣款</option>
			<option value="130">砸蛋贈送</option>
			  </select>
			</div>
        </div>
		<div class="search_br">
		  <input type="submit" class="btn btn-primary btn-sm chazhao" value="查詢"></input>
        <!--div class="search_br"><input type="button" value="查詢" class="formCheck chazhao" /></div-->
		</div>
    </form>
<style type="text/css">
.search_br {padding-top:10px;height:45px;text-align: center;color: #666;}
</style> 
<div class="display biao-cont">
<?php $this->display('report/coin-log.php'); ?>
 </div>
