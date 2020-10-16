﻿<?php $this->display('inc_daohang.php'); ?>


<div id="nsc_subContent" style="border:0">
<script type="text/javascript">

	$(function() {
		$( ".menus-li li").click(function(){
            $( ".menus-li li").removeClass("on");
            $(this).addClass("on");
            $("#tabs-1,#tabs-2").hide();
            $("#tabs-"+($(this).index()+1)).show();
        });
	})
</script>

<div id="siderbar">
<ul class="list clearfix">
<li ><a href="/index.php/team/addlink" >推廣設定</a></li>
<li ><a href="/index.php/team/addMember" >開戶管理</a></li>
<li ><a href="/index.php/team/memberList" >會員列表</a></li>
<li ><a href="/index.php/team/linkList" >推廣連結</a></li>
<li ><a href="/index.php/team/gameRecord" >團隊記錄</a></li>
<li ><a href="/index.php/team/coin" >團隊帳變</a></li>
<li ><a href="/index.php/team/report" >團隊盈虧</a></li>
<li class="current"><a href="/index.php/team/cashRecord" >團隊提現</a></li>
<li ><a href="/index.php/team/coinall" >團隊統計</a></li>
</ul>
</div>

<link rel="stylesheet" href="/css/nsc/reset.css?v=1.16.11.5" />
<link rel="stylesheet" href="/css/nsc/list.css?v=1.16.11.5" />
<link rel="stylesheet" href="/css/nsc/activity.css?v=1.16.11.5" />
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.11.5"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.11.5"></script>
<script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js?v=1.16.11.5"></script>
<link href="/css/nsc/plugin/dialogUI/dialogUI.css?v=1.16.11.5" media="all" type="text/css" rel="stylesheet" />

</head>
<body>
<div id="subContent_bet_re">

<style>
    .task_div{right:50px;}
</style>
<script type="text/javascript">
$(function(){
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});
	
	$('.search input[name=username]')
	.focus(function(){
		//console.log(this.value);
		if(this.value=='帳號名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='帳號名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});
	
	$('.sure[id]').click(function(){
		var $this=$(this),
		cashId=$this.attr('id'),
		
		call=function(err, data){
			if(err){
				alert(err);
			}else{
				this.parent().text('已到帳');
			}
		}
		
		$.ajax('/index.php/cash/toCashSure/'+cashId,{
			dataType:'json',
			
			error:function(xhr, textStatus, errThrow){
				call.call($this, errThrow||textStatus);
			},
			
			success:function(data, textStatus, xhr){
				var errorMessage=xhr.getResponseHeader('X-Error-Message');
				if(errorMessage){
					call.call($this, decodeURIComponent(errorMessage), data);
				}else{
					call.call($this, null, data);
				}
			}
		});
	});
});
function teamBeforeSearchCashRecord(){}
function teamSearchCashRecord(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
<div id="contentBox">
		<form action="/index.php/team/searchCashRecord" target="ajax" onajax="teamBeforeSearchCashRecord" call="teamSearchCashRecord" dataType="html">
      
        <div id="searchBox" class="re">
        	<div class="inlineBlock">
            	<label>提現時間：</label><input type="text" class="input150" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="datetimepicker" /> <span class="image"></span>
            </div>
            <label>至</label>
            <div class="inlineBlock">
            	<input type="text" class="input150" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" name="toTime" /> <span class="image" ></span>
            </div>
			  <div class="inlineBlock">
            	<label>類型：</label><select id="methodid"  name="utype"  class="team">
				
            <option value="0" selected>所有人</option>
            <option value="1">我自己</option>
            <option value="2">直屬下線</option>
            <option value="3" >所有下線</option>
        </select>
            </div>            
            <input type="button" value="查詢" class="formCheck chazhao" /></div>
    </form>
    </div>
  <div class="display biao-cont">
    	<!--下注列表-->
        <?php $this->display('team/cash-record-list.php'); ?>
        <!--下注列表 end -->
    </div>
<?php $this->display('inc_root.php'); ?>
<div class="list_page">
   
    <div class="pageinfo"></div>
</div>
</div></div></div></div></div>
<?php $this->display('inc_che.php'); ?>

 </body>
 </html>