<html xmlns="http://www.w3.org/1999/xhtml" class="gwd_undefined"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
<meta name="keywords" content="">
<meta nam="description" content="">
<title><?=$this->settings['webName']. '-官方網站'?></title>
<link href="/js/nsc_m/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
<link rel="stylesheet" href="/css/nsc/reset.css?v=1.17.1.14">
<link rel="stylesheet" href="/css/nsc/h5_register1.css?v=1.17.1.14">
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.11.16"></script>
<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/js/function.js"></script>
<script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.11"></script>
   <style media="screen">
		#success h3,#error h3{text-align:center;font-size:18px;}
		#error{background:url("/images/nsc/icon_error-big.png") no-repeat center 30px;padding:128px 15px;}
		#success{background:url("/images/nsc/icon_success-big.png") no-repeat center 100px;padding:180px 0  100px;}
		.hint_red{color:#fb2323;}
		.hint_green{color:#60a52c;}
		.hint_green p{margin-bottom:10px;}
    </style>
<script type="text/javascript">
function registerBeforSubmit(){
	var type=$('[name=type]:checked',this).val();
	if(!this.username.value) throw('請輸入帳號名');
	if(!/^\w{5,15}$/.test(this.username.value)) throw('帳號名由5到15位元的字母、數位及底線組成');
	if(!this.password.value) throw('請輸入密碼');
	if(this.password.value.length<6) throw('登入密碼至少6位元');
	//if(!this.cpasswd.value) throw('請輸入確認密碼');
	//if(this.cpasswd.value!=this.password.value) throw('兩次輸入密碼不一樣');
	if(!this.qq.value) throw('請輸QQ號碼');
	if(!this.vcode.value) throw('請輸入驗證碼');
}
function registerSubmit(err, data){
	if(err){
		xingcai(err);
		$("#vcode").trigger("click");
		
	}else{
		layer.open({
                content:(data),
                btn:['確定'],
                yes:function(){
                    window.location='/index.php/user/login';
                }
            })
	}
}
document.onkeydown = keyDown;
function keyDown(e){
	if(event.keyCode == 13){
		$(this).closest('form').submit()
	}
}
</script>  
</head>
<body>

<div class="zc_cont">
    <div class="zc_content">
        <div class="zc_title">
	        <img src="/images/nsc/register/logo_zc2.png?v=1.17.1.14">
	        <span>彩票遊戲帳號註冊</span>
        </div>
        <div class="zc_list" id="apDiv4">
            <ul id="reg_con">
			  <?php if($args[0]){ ?>
             <form action="/index.php/user/rog" onKeyDown="if(event.keyCode==13){return false;}"  method="post" onajax="registerBeforSubmit" enter="true" call="registerSubmit" target="ajax">
               <input type="hidden" name="codec" value="<?=$args[0]?>" />
                <li>
                    <label class="zc_label">帳號名</label>
                    <div class="zc_input"><i class="iczc-number2"></i>
                        <input type="text" name="username" id="username" maxlength="13" class="forget_input" placeholder="帳號名" onKeyUp="value=value.replace(/[\W]/g,'')">
                        <p>由字母或數位組成的6-13個字元</p>
                        <div class="tip"><em></em><p></p></div>
                    </div>
                </li>
                <li>
                    <label class="zc_label">QQ號碼</label>
                    <div class="zc_input"><i class="iczc-username2"></i>
                        <input type="text" name="qq" id="qq" maxlength="11" onKeyUp="(this.v=function(){this.value=this.value.replace(/[^0-9]/,'');}).call(this)" class="forget_input" placeholder="請輸入QQ號碼">
                        <p>由5至11個純數位組成</p>
                        <div class="tip"><em></em><p></p></div>
                    </div>
                </li>
                <li class="password">
                    <label class="zc_label">登錄密碼</label>
                    <div class="zc_input"><i class="iczc-password2"></i>
                        <input type="password" name="password" id="password" onKeyUp="value=value.replace(/[\W]/g,'')"  maxlength="13" class="forget_input" placeholder="登錄密碼">
                        <p>字母和數位組成6-13個字元（必須包含數位和字母）</p>
                        <div class="tip"><em></em><p></p></div>
                    </div>
                </li>
				
				                <li>
                    <label class="zc_label">驗證碼：</label>
                    <div class="zc_input"><i class="iczc-warning2"></i>
                        <input type="text" name="vcode" id="vcode" maxlength="4" class="forget_input" placeholder="驗證碼">
                        <img onClick="this.src='/index.php/user/vcode/'+(new Date()).getTime()" title="點擊刷新" style="cursor:pointer; border: 0px solid #999; vertical-align:middle;" src="/index.php/user/vcode/<?=$this->time?>" class="zc_code">
                        <div class="tip"><em></em><p></p></div>
                    </div>
                </li>
                <li>
                    <div class="zc_input" style="text-align:center">
                      
                        <input type="submit" class="login_btn submit zc_btn" value="立即註冊" >
                      
                    </div>
                </li>
             
                </form> 
            </ul>
        </div>
		 <?php }else{?>
  <section class="wraper-page">
	<div id="error">
		<h3>
			<font class="hint_red">無效的推廣連結！</font>
		</h3>						
	</div>
</section>
    <?php }?>
	    <div class="footer_lxfs">
	        				        	    </div>
    </div>
</div>


</body></html>
