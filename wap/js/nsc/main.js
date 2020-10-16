/*
*獲取地址欄參數
*/
function getUrlPar(strName) {
    var svalue = location.search.match(new RegExp("[\?\&]" + strName + "=([^\&]*)(\&?)", "i"));
    return svalue ? svalue[1] : svalue;
}
//退出提示
function loginout(){
    $.confirm('確定要退出嗎？',function (data){
        if(typeof data) { airAction('out','out'); window.location.href='/index.php/user/logout';
        }
    })
}
//帳號名驗證(由0-9,a-z,A-Z組成的6~16個字元組成)增加連續性四位元字母檢測、排除數位其他johnsonle
function validateUserName( str ) {
    var partern = /(.)\1{3,}/;
    if( partern.exec(str)){
        return false;
    }
	var patrn = /^[0-9a-zA-Z]{6,16}$/;
    if( patrn.exec(str) ){
		return true;
	} else {
		return false;
	}
}
//消息修改
function messageTip(){
    var $objmsg=$("#userMessage span");
    var num=parseInt($objmsg.html())<=0?0:parseInt($objmsg.html())-1;
    $objmsg.html(num);
}
function setCookie(name,value,expire,path) {
	var curdate=new Date();
	var cookie=name+"="+encodeURIComponent(value)+"; ";
	if(expire!=undefined||expire==0){
		if(expire==-1){
			expire=366*86400*1000;//保存一年
		}else{
			expire=parseInt(expire);
		}
		curdate.setTime(curdate.getTime()+expire);
		cookie+="expires="+curdate.toUTCString()+"; ";
	}
	path = path || "/";
	cookie += "path=" + path;
	document.cookie=cookie;
}

function getCookie(name) {
    var re = "(?:; )?" + encodeURIComponent(name) + "=([^;]*);?";
    re = new RegExp(re);
    if (re.test(document.cookie)) {
        return decodeURIComponent(RegExp.$1);
    }
    return '';
}

function chagetheme(){
	setCookie('skins','sincai');
}

//密碼驗證(6－16位元數位和字母，不能只是數位，或者只是字母，不能連續三位元相同)
function validateUserPss(str) {
	var patrn = /^[0-9a-zA-Z]{6,16}$/;
	if( !patrn.exec(str) ) {
		return false;
	}
	patrn = /^\d+$/;
	if( patrn.exec(str) ) {
		return false;
	}
	patrn = /^[a-zA-Z]+$/;
	if( patrn.exec(str) ) {
		return false;
	}
	patrn = /(.)\1{2,}/;
	if( patrn.exec(str) ) {
		return false;
	}
	return true;
}

//日期輸入驗證
// str : 要驗證的日期字串[格式包括 Y-M-D|Y/M/D|YMD [H[:I][:S]]]
function validateInputDate(str) {
	str = $.trim(str);
	if( str == "" || str == null ) {
		return true;
	}
	var tempArr = str.split(" ");
	var dateArr = new Array();
	var timeArr = new Array();
	if( tempArr[0].indexOf("-") != -1 ) {
	    //2009-06-12
		dateArr = tempArr[0].split("-");
	} else if( tempArr[0].indexOf("/") != -1 ) {
	    //2009/06/12
		dateArr = tempArr[0].split("/");
	} else {
	    // 20090612
		if( tempArr[0].toString().length < 8 ) {
			return false;
		}
		dateArr[0] = tempArr[0].substring(0,4);
		dateArr[1] = tempArr[0].substring(4,6);
		dateArr[2] = tempArr[0].substring(6,8);
	}

	if( tempArr[1] == undefined || tempArr[1] == null ){
		tempArr[1] = "00:00:00";
	}

    if( tempArr[1].indexOf(":") != -1 ) {
		timeArr = tempArr[1].split(":");
	}

    if( dateArr[2] != undefined && ( dateArr[0] == "" || dateArr[1] == "" ) ) {
		return false;
	}

    if( dateArr[1] != undefined && dateArr[0] == "" ) {
		return false;
	}

	if( timeArr[2] != undefined && ( timeArr[0] == "" || timeArr[1] == "" ) ) {
		return false;
	}

    if( timeArr[1] != undefined && timeArr[0] == "" ) {
		return false;
	}
	dateArr[0]  = (dateArr[0]==undefined || dateArr[0] == "") ? 1970 : dateArr[0];
	dateArr[1]  = (dateArr[1]==undefined || dateArr[1] == "") ? 0 : (dateArr[1]-1);
	dateArr[2]  = (dateArr[2]==undefined || dateArr[2] == "") ? 0 : dateArr[2];
	timeArr[0]  = (timeArr[0]==undefined || timeArr[0] == "") ? 0 : timeArr[0];
	timeArr[1]  = (timeArr[1]==undefined || timeArr[1] == "") ? 0 : timeArr[1];
	timeArr[2]  = (timeArr[2]==undefined || timeArr[2] == "") ? 0 : timeArr[2];
	var newDate = new Date(dateArr[0],dateArr[1],dateArr[2],timeArr[0],timeArr[1],timeArr[2]);
	if(
	   newDate.getFullYear()==dateArr[0] && newDate.getMonth()==dateArr[1] && newDate.getDate()==dateArr[2]
	   && newDate.getHours()==timeArr[0] && newDate.getMinutes()==timeArr[1] && newDate.getSeconds()==timeArr[2]
	) {
		return true;
	} else {
		return false;
	}
	return true;
}

function srip2tInit() {

	if(sriptSetInterval1) clearInterval(sriptSetInterval1);

	$("#newsList li:odd").addClass("odd"); // 奇
    $("#newsList li:even").addClass("even"); // 偶

    $(".formTable tr:odd").addClass("odd"); // 奇
    $(".formTable tr:even").addClass("even"); // 偶

    $(".grayTable tr th:first-child").css("borderLeft","1px solid #D5D8DE");
    $(".grayTable tr td:first-child").css("borderLeft","1px solid #EFEFEF");
    $(".grayTable tr td:last-child").css("borderRight","1px solid #EFEFEF");

	$("#checkAll").click(function(){
		if(this.checked) $('input[type=checkbox][name=items]').attr("checked", true );
		else $('input[type=checkbox][name=items]').attr("checked", false );
	});
	var tyAll = false;
    $("#tyAll1").click(function(){
        $('input[type=checkbox][name=tyAll]').attr("checked", true );
		var value = $("#tyText1").val();
        $('input[type=text][name=tyText1]').val(value);
		tyAll = true;
	});
    $("#tyAll2").click(function(){
        $('input[type=checkbox][name=tyAll]').attr("checked", true );
		var value = $("#tyText2").val();
        $('input[type=text][name=tyText2]').val(value);
		tyAll = true;
	});
    $("#tyText1").keyup(function () {
		if(tyAll) {
			var value = $(this).val();
            $('input[type=text][name=tyText1]').val(value);
		}

    }).keyup();
    $("#tyText2").keyup(function () {
		if(tyAll) {
			var value = $(this).val();
            $('input[type=text][name=tyText2]').val(value);
		}
    }).keyup();

    $("#setDetail").click(function(){
		var allbacksetHeight = parseInt($("#allbackset").css("height"))
		if(allbacksetHeight==0) {
            $(this).val("收起詳細");
            $('#allbackset').animate({height: '430px'}, 500, function() {});
		}
		else  {
            $(this).val("詳細設置");
            $('#allbackset').animate({height: '0px'}, 500, function() {});
		}
	});

    $("#starttime").dynDateTime({
		ifFormat: "%Y-%m-%d %H:%M:00",
		daFormat: "%l;%M %p, %e %m,  %Y",
		align: "Br",
		electric: true,
		singleClick: false,
		button: ".next()", //next sibling
		onUpdate:function(){
			$("#starttime").change();
		},
		showOthers: true,
		weekNumbers: true,
		showsTime: true
	});
    $("#starttime").change(function(){
		if(! validateInputDate($("#starttime").val()) )
		{
            $("#starttime").val('');
            $.alert("時間格式不正確,正確的格式為:2009-06-10 10:59");
		}
		if($("#endtime").val()!="")
		{
			if($("#starttime").val()>$("#endtime").val())
			{
                $("#starttime").val("");
                $.alert("輸入的時間不符合邏輯");
			}
		}
	});
    $("#endtime").dynDateTime({
		ifFormat: "%Y-%m-%d %H:%M:00",
		daFormat: "%l;%M %p, %e %m,  %Y",
		align: "Br",
		electric: true,
		singleClick: false,
		button: ".next()", //next sibling
		onUpdate:function(){
            $("#endtime").change();
		},
		showOthers: true,
		weekNumbers: true,
		showsTime: true
	});
    $("#endtime").change(function(){
		if(! validateInputDate($("#endtime").val()) )
		{
            $("#endtime").val('');
            $.alert("時間格式不正確,正確的格式為:2009-06-10 10:59");
		}
		if($("#starttime").val()!="")
		{
			if($("#starttime").val()>$("#endtime").val())
			{
                $("#endtime").val("");
                $.alert("輸入的時間不符合邏輯");
			}
		}
	});
}


//密碼驗證(6－16位元數位和字母，不能只是數位，或者只是字母，不能連續三位元相同)
function validateUserPss( str ) {
	var patrn = /^[0-9a-zA-Z]{6,16}$/g;
	if( !patrn.exec(str) ) {
		return false;
	}
	patrn = /^\d+$/g;
	if( patrn.exec(str) ) {
		return false;
	}
	patrn = /^[a-zA-Z]+$/g;
	if( patrn.exec(str) ) {
		return false;
	}

	return true;
}
function changeAddress(obj,trl) {
	if(trl=='emaildeposit'){
		if(obj=='icbcChongzhi'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 工行儲值');
		}else if(obj=='abcChongzhi'){
            $("#siderbar li:nth-child(2)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 農行儲值');
		}else if(obj=='ccbChongzhi'){
            $("#siderbar li:nth-child(3)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 建行儲值');
		}else if(obj=='tenpaychongzhi'){
            $("#siderbar li:nth-child(4)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 財付通儲值');
		}else if(obj=='platwithdraw'){
            $("#siderbar li:nth-child(5)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 我要提現');
		}
	}
	else if(trl=='userCenter'){
		if(obj=='userset'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 頻道設定');
		}else if(obj=='changeloginpass'){
            $("#siderbar li:nth-child(2)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 修改密碼');
		}else if(obj=='changename'){
            $("#siderbar li:nth-child(3)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 修改暱稱');
		}else if(obj=='emailbind'){
            $("#siderbar li:nth-child(4)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 郵箱綁定');
		}else if(obj=='userbankinfo'){
            $("#siderbar li:nth-child(5)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶信息 <span class="st"> > </span> 卡號綁定');
		}else if(obj=='myEmails'){
            $("#siderbar li:nth-child(6)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 我的消息');
		}else if(obj=='userlist'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表');
		}else if(obj=='userlist_yhxx'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 使用者資訊');
		}else if(obj=='userlist_td'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 團隊');
		}else if(obj=='userlist_cz'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 彩種設置');
		}else if(obj=='userlist_yxzb'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 遊戲賬變');
		}else if(obj=='userlist_czjl'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 儲值記錄');
		}else if(obj=='userlist_dj'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 凍結');
		}else if(obj=='userlist_cz'){
            $("#siderbar li:nth-child(7)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 儲值');
		}else if(obj=='openadmin'){
            $("#siderbar li:nth-child(8)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 開戶管理');
		}else if(obj=='adduser'){
            $("#siderbar li:nth-child(9)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 增加帳號');
		}
	}
	else if(trl=='gameinfo'){
		if(obj=='gamelist'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 遊戲記錄 <span class="st"> > </span> 購彩查詢');
		}else if(obj=='task'){
            $("#siderbar li:nth-child(2)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 遊戲記錄 <span class="st"> > </span> 追號查詢');
		}
	}
	else if(trl=='report'){
		if(obj=='checkbalance'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 餘額查詢');
		}else if(obj=='bankreport'){
            $("#siderbar li:nth-child(2)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 充提記錄');
		}else if(obj=='orders'){
            $("#siderbar li:nth-child(3)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 遊戲賬變');
		}else if(obj=='userpoint'){
            $("#siderbar li:nth-child(4)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 返點總額');
		}else if(obj=='list'){
            $("#siderbar li:nth-child(5)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 報表查詢');
		}
	}
	else if(trl=='help'){
		if(obj=='noticelist'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 公告列表');
		}else if(obj=='noticeDetail'){
            $("#siderbar li:nth-child(1)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 公告列表 <span class="st"> > </span> 詳細');
		}else if(obj=='playinfo'){
            $("#siderbar li:nth-child(2)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 玩法介紹');
		}else if(obj=='answer'){
            $("#siderbar li:nth-child(3)").addClass("current");
            $("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 常見問題');
		}
	}
}
//呢稱驗證
function validateNickName( str )
{
	var patrn = /^.{2,10}$/g;
	if( patrn.exec(str) ) {
		return true;
	} else {
		return false;
	}
}
function siderbarInit(obj,trl,tag) {//it's menu'list method'
	if(trl=='emaildeposit'){

		$("#siderbar .title").html('儲值提現');
		$("#mainContent .topName").html('儲值提現');
		$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現');
		$("#siderbar .list") .html("<li><a href=javascript:void(0) onclick=ListClick('chongzhi','emaildeposit','mdeposit') id=mdeposit>工行儲值</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('chongzhi','emaildeposit','abc') id=abc>農行儲值</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('chongzhi','emaildeposit','ccb') id=ccb>建行儲值</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('chongzhi','emaildeposit','tenpay') id=tenpay>財付通儲值</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('platwithdraw','security','platwithdraw') id=platwithdraw>我要提現</a></li>");
		if(tag=='mdeposit'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 工行儲值');
		}else if(tag=='abc'){
			$("#siderbar li:nth-child(2)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 農行儲值');
		}else if(tag=='ccb'){
			$("#siderbar li:nth-child(3)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 建行儲值');
		}else if(tag=='tenpay'){
			$("#siderbar li:nth-child(4)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 財付通儲值');
		}else if(tag=='platwithdraw'){
			$("#siderbar li:nth-child(5)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 儲值提現 <span class="st"> > </span> 我要提現');
		}
	}
	else if(trl=='user'){

		$("#siderbar .title").html('帳戶信息');
		$("#mainContent .topName").html('帳戶信息');
		$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶信息');
		$("#siderbar .list") .html("<li><a href=javascript:void(0) onclick=ListClick('userset','user','userset') id=userset>頻道設定</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('changeloginpass','user','changeloginpass') id=changeloginpass>修改密碼</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('changename','user','changename') id=changename>修改暱稱</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('emailbind','user','emailbind') id=emailbind>郵箱綁定</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('userbankinfo','user','userbankinfo') id=userbankinfo>卡號綁定</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('myEmails','userCenter') id=myEmails>我的消息</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('userlist','userCenter') id=userlist>帳號列表</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('openadmin','userCenter') id=openadmin>開戶管理</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('adduser','userCenter') id=adduser>增加帳號</a></li>");

		if(obj=='userset'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 頻道設定');
		}else if(obj=='changeloginpass'){
			$("#siderbar li:nth-child(2)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 修改密碼');
		}else if(obj=='changename'){
			$("#siderbar li:nth-child(3)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 修改暱稱');
		}else if(obj=='emailbind'){
			$("#siderbar li:nth-child(4)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 郵箱綁定');
		}else if(obj=='userbankinfo'){
			$("#siderbar li:nth-child(5)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶信息 <span class="st"> > </span> 卡號綁定');
		}else if(obj=='myEmails'){
			$("#siderbar li:nth-child(6)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 我的消息');
		}else if(obj=='userlist'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表');
		}else if(obj=='userlist_yhxx'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 使用者資訊');
		}else if(obj=='userlist_td'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 團隊');
		}else if(obj=='userlist_cz'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 彩種');
		}else if(obj=='userlist_yxzb'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 遊戲賬變');
		}else if(obj=='userlist_czjl'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 儲值記錄');
		}else if(obj=='userlist_dj'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 凍結');
		}else if(obj=='userlist_cz'){
			$("#siderbar li:nth-child(7)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 帳號列表 <span class="st"> > </span> 儲值');
		}else if(obj=='openadmin'){
			$("#siderbar li:nth-child(8)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 開戶管理');
		}else if(obj=='adduser'){
			$("#siderbar li:nth-child(9)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 帳戶資訊 <span class="st"> > </span> 增加帳號');
		}
	}
	else if(trl=='gameinfo'){
		$("#siderbar .title").html('遊戲記錄');
		$("#mainContent .topName").html('遊戲記錄');
		$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 遊戲記錄');
		$("#siderbar .list") .html("<li><a href=javascript:void(0) onclick=ListClick('gamelist','gameinfo') id=gamelist>購彩查詢</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('task','gameinfo') id=task>追號查詢</a></li>");
		if(obj=='gamelist'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 遊戲記錄 <span class="st"> > </span> 購彩查詢');
		}else if(obj=='task'){
			$("#siderbar li:nth-child(2)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 遊戲記錄 <span class="st"> > </span> 追號查詢');
		}
	}
	else if(trl=='report'){
		$("#siderbar .title").html('報表管理');
		$("#mainContent .topName").html('報表管理');
		$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理');
		$("#siderbar .list") .html("<li><a href=javascript:void(0) onclick=ListClick('checkbalance','report') id=checkbalance>餘額查詢</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('bankreport','report') id=bankreport>充提記錄</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('orders','report') id=orders>遊戲賬變</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('userpoint','report') id=userpoint>返點總額</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('list','report') id=list>報表查詢</a></li>");
		if(obj=='checkbalance'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 餘額查詢');
		}else if(obj=='bankreport'){
			$("#siderbar li:nth-child(2)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 充提記錄');
		}else if(obj=='orders'){
			$("#siderbar li:nth-child(3)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 遊戲賬變');
		}else if(obj=='userpoint'){
			$("#siderbar li:nth-child(4)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 返點總額');
		}else if(obj=='list'){
			$("#siderbar li:nth-child(5)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 報表管理 <span class="st"> > </span> 報表查詢');
		}
	}
	else if(trl=='help'){
		$("#siderbar .title").html('新手指南');
		$("#mainContent .topName").html('新手指南');
		$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南');
		$("#siderbar .list") .html("<li><a href=javascript:void(0) onclick=ListClick('noticelist','help') id=noticelist>公告列表</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('playinfo','help') id=playinfo>玩法介紹</a></li>");
		$("#siderbar .list") .append("<li><a href=javascript:void(0) onclick=ListClick('answer','help') id=answer>常見問題</a></li>");
		if(obj=='noticelist'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 公告列表');
		}else if(obj=='noticeDetail'){
			$("#siderbar li:nth-child(1)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 公告列表 <span class="st"> > </span> 詳細');
		}else if(obj=='playinfo'){
			$("#siderbar li:nth-child(2)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 玩法介紹');
		}else if(obj=='answer'){
			$("#siderbar li:nth-child(3)").addClass("current");
			$("#address").html('<span class="st">·</span>首頁 <span class="st"> > </span> 新手指南 <span class="st"> > </span> 常見問題');
		}
	}
}

var temp = getUrlPar("tag");
function ListClick(obj,trl,tag) {
	$("#"+tag).parents("#siderbar").find("li").removeClass("current");
	$("#"+tag).parent().addClass("current");

	if(tag!=temp) {
		siderbarInit(obj,trl,tag);
	} else {
		changeAddress(obj,trl,tag);
	}
	temp = tag;
	if(tag) {
		var tagurl= '&tag='+tag;
	}

	$("#contentBox").each(function(){
		var spanTemp = $(this);
		spanTemp.html('<div align=center><img src="images/mbo2012/loadingAnimation.gif"><br><br>正在載入......</div>');
		$.ajax({
			type:"POST",
			//url: "mainContent.html",
			url: "?controller="+trl+"&action="+obj+"&ajax=1"+tagurl,
			timeout:30000,
			dataType: "html",
			success:function(data)
			{
				var msgHtml  = data;

			//	var msgHtml  = $(data).filter('#'+obj).html();
			//	sriptSetInterval1 = setInterval('sriptInit()',100)

				if(!data) msgHtml = $(data).filter('#errorBox').html();
				spanTemp.empty();
				spanTemp.html(msgHtml);
				clearTimeout();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				$.alert("請求超時請重試");
			}
		});
	});
}

function nochecksercuity(checkid){
	$("#contentBox").each(function(){
		var spanTemp = $(this);
		spanTemp.html('<div align=center><img src="images/mbo2012/loadingAnimation.gif"><br><br>正在載入......</div>');
		$.ajax({
			type:"POST",
			//url: "mainContent.html",
			url: "?controller=security&action=platwithdraw&check="+checkid,
			timeout:30000,
			dataType: "html",
			success:function(data)
			{

				var msgHtml  = data;

			//	var msgHtml  = $(data).filter('#'+obj).html();
			//	sriptSetInterval1 = setInterval('sriptInit()',100)

				if(!data) msgHtml = $(data).filter('#errorBox').html();
				spanTemp.empty();
				spanTemp.html(msgHtml);
				clearTimeout();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				$.alert("請求超時請重試");
			}
		});
	});
}

//onkeyup:根據使用者輸入的資金做檢測並自動轉換中文大寫金額(用於儲值和提現)
//obj:檢測物件元素，chineseid:要顯示中文大小寫金額的ID，maxnum：最大能輸入金額
function checkWithdraw(obj,chineseid,maxnum) {
	obj.value = formatFloat(obj.value);
	if( parseFloat(obj.value) > parseFloat(maxnum) ) {
		alert("輸入金額超出了可用餘額");
		obj.value = maxnum;
	}
	$("#"+chineseid).html( changeMoneyToChinese(obj.value) );
}

function postdata(data,contr,act,formobj) {
	var acount,postdata ="";
	acount = data.length;

	for(var i=0;i<acount;i++) {
		postdata+=data[i]+"="+formobj.elements[data[i]].value+"&";
	}

	$.ajax({
		type:"POST",
		url: "?controller="+contr+"&action="+act+"&ajax=1",
		processData: false,
		data: postdata,
		success: function(data) {
			$("#contentBox").html(data);
		}
	});
}

function checkemailWithdraw( obj,chineseid,maxnum ){
	obj.value = formatFloat(obj.value);
	if( parseFloat(obj.value) > parseFloat(maxnum) ){
		$.alert("您的儲值金額已經超出規定限額");
		obj.value = maxnum;
	}
	$("#"+chineseid).html( changeMoneyToChinese(obj.value) );
}

//格式化浮點數形式(只能輸入正浮點數，且小數點後只能跟四位,總體數值不能大於999999999999999共15位:數值999兆)
function formatFloat( num ) {
	num = num.replace(/^[^\d]/g,'');
	num = num.replace(/[^\d.]/g,'');
	num = num.replace(/\.{2,}/g,'.');
	num = num.replace(/^[0].*/g,'');
	num = num.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	if( num.indexOf(".") != -1 ) {
		var data = num.split('.');
		num = (data[0].substr(0,15))+'.'+(data[1].substr(0,2));
	} else {
		num = num.substr(0,15);
	}
	return num;
}

function show_no(id) {
	$("#code_"+id).show("slow");
}

function show_nocode(id) {
	$("#ncode_"+id).show("slow");
}

function close_no(id) {
	$("#code_"+id).hide("slow");
}

function nclose_no(id) {
	$("#ncode_"+id).hide("slow");
}

//自動轉換數位金額為大小寫中文字元,返回大小寫中文字串，最大處理到999兆
function changeMoneyToChinese( money ) {
	var cnNums	= new Array("零","壹","貳","三","肆","伍","陸","柒","捌","玖");	//漢字的數位
	var cnIntRadice = new Array("","拾","佰","仟");	//基本單位
	var cnIntUnits = new Array("","萬","億","兆");	//對應整數部分擴展單位
	var cnDecUnits = new Array("角","分","毫","厘");	//對應小數部分單位
	var cnInteger = "整";	//整數金額時後面跟的字元
	var cnIntLast = "元";	//整型完以後的單位
	var maxNum = 999999999999999.9999;	//最大處理的數位

	var IntegerNum;		//金額整數部分
	var DecimalNum;		//金額小數部分
	var ChineseStr="";	//輸出的中文金額字串
	var parts;		//分離金額後用的陣列，預定義

	if( money == "" ){
		return "";
	}

	money = parseFloat(money);
	//alert(money);
	if( money >= maxNum ){
		$.alert('超出最大處理數位');
		return "";
	}
	if( money == 0 ){
		ChineseStr = cnNums[0]+cnIntLast+cnInteger;
		//document.getElementById("show").value=ChineseStr;
		return ChineseStr;
	}
	money = money.toString(); //轉換為字串
	if( money.indexOf(".") == -1 ){
		IntegerNum = money;
		DecimalNum = '';
	}else{
		parts = money.split(".");
		IntegerNum = parts[0];
		DecimalNum = parts[1].substr(0,4);
	}
	if( parseInt(IntegerNum,10) > 0 ){//獲取整型部分轉換
		zeroCount = 0;
		IntLen = IntegerNum.length;
		for( i=0;i<IntLen;i++ ){
			n = IntegerNum.substr(i,1);
			p = IntLen - i - 1;
			q = p / 4;
            m = p % 4;
			if( n == "0" ){
				zeroCount++;
			}else{
				if( zeroCount > 0 ){
					ChineseStr += cnNums[0];
				}
				zeroCount = 0;	//歸零
				ChineseStr += cnNums[parseInt(n)]+cnIntRadice[m];
			}
			if( m==0 && zeroCount<4 ){
				ChineseStr += cnIntUnits[q];
			}
		}
		ChineseStr += cnIntLast;
	//整型部分處理完畢
	}
	if( DecimalNum!= '' ) {//小數部分
		decLen = DecimalNum.length;
		for( i=0; i<decLen; i++ ) {
			n = DecimalNum.substr(i,1);
			if( n != '0' ) {
				ChineseStr += cnNums[Number(n)]+cnDecUnits[i];
			}
		}
	}
	if( ChineseStr == '' ) {
		ChineseStr += cnNums[0]+cnIntLast+cnInteger;
	} else if( DecimalNum == '' ) {
		ChineseStr += cnInteger;
	}
	return ChineseStr;
}

function moneyFormat(num) {
	var sign = Number(num) < 0 ? "-" : "";
    num = num.toString();
	if( num.indexOf(".") == -1 ) {
		num = "" + num + ".0000";
	}
	var data = num.split('.');
	data[0] = data[0].toString().replace(/[^\d]/g,"").substr(0,15);
	data[0] = Number(data[0]).toString();
	var newnum = [];
	for( var i=data[0].length; i>0; i-=3 ) {
		newnum.unshift(data[0].substring(i,i-3));
	}
	data[0] = newnum.join(",");
	data[1] = data[1].toString().substr(0,4);
	return sign+""+data[0] + "." + data[1];
}


function autoAlertPrize() {//checkgetprize();
	alt=setTimeout('autoAlertPrize()',20000);
}


function jjtc(){
	$.alert('即將推出，敬請期待');
}
function future(){
  layer.msg('即將推出，謝謝關注');
}
function checkgetprize() {
	$.ajax({
		type : 'POST',
		url  : './?controller=default&action=checkgetprize',
		timeout : 10000,
		success : function(data){
			if( data == "error" ){
				return false;
			}else{
				$.alert(data);
				return true;
			}
		}
	});
}

//20130425 Tomcat 新增針對返點數值輸入的檢查---
function clearNoNum(obj){
    var myregexp = /\d+\.?\d?/;
    var match = myregexp.exec(obj.value);
    if (match != null) {
        obj.value = match[0];
    } else {
        obj.value = "";
    }
}

function checkNum(obj) {
    //為了去除最後一個.
    obj.value = obj.value.replace(/\.$/g,".0");
}

function cIsclient(sUrl){
    openweb(sUrl);
};

function isclient(Csurl){
    if(getCookie('isclient')){
        cIsclient(Csurl);
    }else{
        window.open(Csurl,'線上客服','width=590,height=550');
    }
};

//用於Air的方法
function airAction(uname,nicename){
	//alert(uname);
}

function backpage() {
}

function checkbackspace(flag) {
	if(getCookie('isclient')){
		top.backpage();
	} else {
		window.history.back();
	}
}

function backtospace() {
	window.open(document.referrer,'_self');
}

//判斷是否IE流覽器
function fnCheckIe(){
	var broswer = navigator.userAgent;
	var ver = parseInt(broswer.substr(broswer.indexOf("MSIE")+5,3));
	if(ver <= 8){
		return true;
	}else{
		return false;
	}
}

$(function(){
	var moveIn = false;
	var moveSeeIn = false;

	$(document).on('mouseover','.task_div',function(){
		moveIn = true;
	});

	$(document).on('mouseout','.task_div',function(){
		moveIn = false;
	});

	$(document).on('mouseover','.seeMore',function(){
		moveSeeIn = true;
	});

	$(document).on('mouseout','.seeMore',function(){
		moveSeeIn = false;
	});

	$(document).click(function(){
		if(!moveIn){
			$('.task_div').hide('slow');
		}

		if(!moveSeeIn){
			$('.seeMore').hide();
		}
	});

	$(document).on("click",".seeMore",function(){
		if(moveIn){
			$('.task_div').hide('slow');
		}

		if(moveSeeIn){
			$('.seeMore').hide();
		}
	});

})

jQuery.extend( jQuery.easing,  {
    easeOutBounce: function (x, t, b, c, d) {
        if ((t/=d) < (1/2.75)) {
            return c*(7.5625*t*t) + b;
        } else if (t < (2/2.75)) {
            return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
        } else if (t < (2.5/2.75)) {
            return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
        } else {
            return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
        }
    },
});

    $(function(){
        
        //第一次進入這個頁面
        var once = true;
        var _href = "";
        if(once == true){
        	once = false;
        	_href = $("#siderbar li.current a").attr("href");
        	$("#mainFrame").attr("src",_href);
        }
        
       
    })
