<?php $this->display('inc_daohang2.php'); ?>
<section class="wraper-page">
<div class="m_user_index">
	<div class="m_user_index_top_box"><div class="m_user_index_top_logo">
		<div class="m_user_name">
			<div class="m_u_name">歡迎您, <?=$this->user['username']?>
            <a href="#" class="ui_msgnum" style="display:none">0</a></div>
			<!--<div class="m_u_info">簽到： <a datatype="json" call="indexSign" target="ajax" href="/index.php/display/sign" class="m_u_info_btn"></a></div>-->
		</div>
			<div class="m_y_moery">
				<div class="v-moeny">
					<div class="you-money">
		                <span class="t_money rounded" title="0.0000">
		                    <div class="show-money" style="display: block;"><i>您的餘額：</i><span id="refff"><b>0.000</b></span>
		                    <a href="javascript:;" title="隱藏餘額">
		                     <i class="ic-unlook" title="隱藏餘額"></i>
		                </a></div>
		                    <div class="hide-money" style="display: none;"><i>您的餘額：</i><span><b>************</b></span>
		                    	<a href="javascript:;" title="隱藏餘額">
				                    <i class="ic-unlook" title="隱藏餘額"></i>
				                </a>
		                    </div>
		                </span> 		                
					</div>
				</div>
			</div>
			<div class="m_u_nav_list">
					<ul>
						<li><a class="m_user_chongzhi" href="/index.php/cash/recharge">
								儲值
						</a></li>
						<li><a class="m_user_tixian" href="/index.php/cash/toCash">
							
							提現
						</a></li>
						<li><a class="m_user_jilu" href="/index.php/cash/rechargeLog">
							儲值記錄
						</a></li>
						<li><a class="m_user_zbjilu" href="/index.php/cash/toCashLog">
							提現記錄
						</a></li>
					</ul>
				</div>
	</div></div>
	<div class="m_reports_muelist">
			<dl>
			<dt class="m_user_reports_title">
				<span class="m_re_name m_account">帳戶管理</span>
			</dt>
			<dd>
				<ul class="m_user_reports_list">
					<li>
						<a class="reports_list_title" href="/index.php/record/search">投注記錄</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/report/coin">帳變記錄</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/report/count">盈虧報表</a>
						<div class="m_user_reports_child"></div>
					</li>	
					<li>
						<a class="reports_list_title" href="/index.php/safe/info">綁定卡號</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/safe/loginpasswd">登入密碼</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/safe/passwd">提款密碼</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/box/receive">消息管理</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/Lives/getBBOrder">額度記錄</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/Lives/moeny">額度轉換</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/Lives/getBetList">電子下注記錄</a>
						<div class="m_user_reports_child"></div>
					</li>
					
				<li class="cler_both"></li>
				<!-- <div class="cler_both"></div> -->
				</ul>
			</dd>
		</dl>
		<?php if($this->user['type']){?>
		<dl>
			<dt class="m_user_reports_title">
				<span class="m_re_name">團隊管理</span> <!-- <a class="m_re_yue" href="">團隊餘額</a> -->
			</dt>
			<dd>
				<ul class="m_user_reports_list">
					<li>
						<a class="reports_list_title re_cur" href="javascript:;">推廣連結</a>
						<div class="m_user_reports_child">
							<a class="reports_list_list" href="/index.php/team/linkList">連結管理</a>
							<a class="reports_list_list" href="/index.php/team/addlink">推廣設定</a>
						</div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/memberList">帳號列表</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/addMember">註冊管理</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/gameRecord">團隊記錄</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/coin">團隊帳變</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/report">團隊盈虧</a>
						<div class="m_user_reports_child"></div>
					</li>
					<li>
						<a class="reports_list_title" href="/index.php/team/coinall">團隊統計</a>
						<div class="m_user_reports_child"></div>
					</li>
				</ul>
			</dd>
		</dl>
		<?}?>
	</div>
</div>
<div class="m_footer_annotation">
                        未滿18周歲禁止購買<br>
                Copyright © 2020  阿舍仔娛樂城版權所有
                <!-- <a href="#" class="m_f_top"></a> -->
</div>
<script type="text/javascript" src="/js/nsc_m/res.js?v=1.17.1.23"></script>
<script type="text/javascript">
$(function(){
    var riable=0;
    $(".nfdprize_text").click(function(){
        if(riable==0){
            riable=1;
            $(".m-lott-methodBox .nfdprize_text b").addClass('cur')
        }else{
            riable =0;
            $(".m-lott-methodBox .nfdprize_text b").removeClass('cur')
        }
        $(".m-lott-methodBox-list").toggle();
    });
}())
    
</script>

<script type="text/javascript">
$(document).ready(function(){
	var  alegnt = $(".m_user_reports_list");
	for(var i=0 ,b = alegnt.length;i<b;i++){
		var bb  = alegnt.eq(i).children("li");
		for(var g=0,c =bb.length;g<c;g++){
			var lis_title = bb.eq(g).children(".reports_list_title");
			var lis = bb.eq(g).children(".m_user_reports_child").children("a");
			if(lis.length>0){
				var text = lis.eq(0).attr("href");
				lis_title.attr("href","javascript:;")
				lis_title.addClass("re_cur")
			}
		}
	}
	$(".reports_list_title").on("touchstart",function(e){
		var e = window.event || arguments.callee.caller.arguments[0];
		e.stopPropagation();
		var _this = $(this);
	    var sbList = _this.siblings(".m_user_reports_child").find("a").length;
	    _this.parents("li").css("z-index",20).siblings("li").css("z-index",0); 
	    _this.parent("dl").siblings().find("li").css("z-index",0);//相容代碼
	    if(sbList>0){
	    	$(this).siblings(".m_user_reports_child").toggle();
	    	$(this).parent("li").siblings().find(".m_user_reports_child").hide();
	    	$(this).parents("dl").siblings().find(".m_user_reports_child").hide();
	    	$(this).toggleClass("re_cur2");
	    	$(this).parents("dl").siblings().find("a").removeClass("re_cur2");
	    	$(this).parent("li").siblings().find("a").removeClass("re_cur2");
	    }else{
	    	$(".m_user_reports_child").hide();
	    }
	     
	});
	$(document).on('touchstart',function(){
		var e = window.event || arguments.callee.caller.arguments[0];
		e.stopPropagation();
       $('.m_user_reports_child').hide();
       $("dl").find("li").css("z-index",0)
       $(".reports_list_title").removeClass("re_cur2");
	});
	$('.m_user_reports_child').on('touchstart',function(e){
	    e.stopPropagation();
	});
});

</script>

</body>
</html>
