<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 16.3125px;" class="gwd_undefined"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
<meta name="keywords" content="">
<meta nam="description" content="">
<title><?=$this->settings['webName']. ''?></title>

<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.11.16"></script>
<script>var TIP=true;</script>
<link rel="stylesheet" href="/css/nsc_m/res1.css?v=1.16.11.16">
<link rel="stylesheet" type="text/css" media="all" href="/js/common/calendar/css/calendar-blue.css?v=1.16.11.16">
    <!-- Data Tables -->
<link href="/hcss/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="/hcss/css/font-awesome.css?v=4.4.0" rel="stylesheet">	
<link href="/hcss/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="/hcss/css/animate.css" rel="stylesheet">
<link href="/hcss/css/style.css?v=4.1.0" rel="stylesheet">
<script src="/hcss/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/hcss/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!--日期控件-->
<link href="/newskin/riqi/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/newskin/riqi/js/date.js" ></script>
<script type="text/javascript" src="/newskin/riqi/js/iscroll.js" ></script>
<div id="datePlugin"></div>
<script type="text/javascript">
$(function(){
	$('#startTime').date({theme:"datetime"});
	$('#endTime').date({theme:"datetime"});
});
</script>
<!--日期控件end-->
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.12.4"></script>
<!--消息控件-->
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>

<link href="/js/nsc_m/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.11"></script>
<!--script type="text/javascript" src="/js/nsc/common.js?v=1.16.11.16"></script-->

  <link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css" />
<script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
<div>
<form action="/index.php/score/dzyhtked" method="post" target="ajax" onajax="Beforindexdzyh" call="indexdzyhtked" onkeydown="if(event.keyCode==13)return false;">
      
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="grayTable">
                <!---->
                	                                              <tr>
              <td class="u_add_zl">提款人：</td>
              <td class="u_add_zr" >
              <label><?=$this->user['username']?></span></label>
              </td>
              </tr>
              <tr>
                <td class="u_add_zl">存款时间：</td>
                <td class="u_add_zr" ><?=date('Y-m-d H:i',$args[0]['time'])?></td>
              </tr>
              <tr>
                <td class="u_add_zl">提款时间：</td>
                <td class="u_add_zr" ><?=date('Y-m-d H:i',$this->time)?></td>
              </tr>
              <tr>
                <td class="u_add_zl">本息+利息总额：</td>
                <td class="u_add_zr" ><?=$args[0]['ck_money']?>&nbsp+<?=$args[0]['lx']?>&nbsp=&nbsp<?=$args[0]['ck_money']+$args[0]['lx']?>&nbsp元</td>
              </tr>
			  <tr>
                <td class="u_add_zl">资金密码：</td>
                <td class="u_add_zr" ><input type="password" name="coinpassword" id="coinpassword" value=""/></td>
              </tr>
			  <tr>
                <td class="u_add_zl">验证码：</td>
                <td class="u_add_zr" ><input type="text" name="vcode" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9]/,'');}).call(this)" onblur="this.v();" maxlength="4"/><p class="hint_p"></p><img width="58" height="32" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></td>
              </tr>
			  <tr>
			   <td class="u_add_zl"></td>
			   <td class="u_add_zl"><input type="submit" class="formWord" value="确认存款">
			   </td>
			  </tr>
            
		
	
</form>
</div>