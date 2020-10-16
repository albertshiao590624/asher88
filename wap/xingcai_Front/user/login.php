<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 16.56px;"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=2.0">
    <meta name="format-detection" content="telephone=no">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
    <title>阿舍仔娛樂城-官方網站</title>
    <link rel="stylesheet" href="/css/nsc_m/normalize.css?v=1.17.1.12">
	<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/main/reglogin.js"></script>
<script type="text/javascript" src="/skin/js/gamecommon.js"></script>
   <style media="screen">
        html,body{height:100%;font-family:microsoft yahei;background-color:#fff;background:url(/images/nsc_m/login/login_bg.png) no-repeat center;background-size:cover;background-attachment:fixed;}
        ul,li{list-style-type:none;margin:0;padding:0;}
        .container{height:100%;}
        header img{display:block;height:6.74rem;padding:3.55rem 0 1.7rem;margin:0 auto;}
        #form-area form{width:20.55rem;margin:0 auto;background-color: rgba(0,0,0,.2);border-radius: .3rem;padding-top: .5rem;padding-bottom: .5rem;border-bottom-right-radius: .2rem;border-top-right-radius: .2rem;}
        #form-area dl{width:80%;height:2.96rem; background-color: #fff;margin: 1.5rem auto; position:relative; border-radius: .2rem;}
        #form-area dt{position:absolute;}
        #form-area dd{display:block;margin:0 0 0 1.18rem;padding:0;}
        #form-area input::-webkit-input-placeholder{color:#0056ad;transition:color .15s;-webkit-transition:color .15s;-moz-transition:color .15s;}
        #form-area .has-error::-webkit-input-placeholder{color:#0056ad;}
        #form-area input{border:none;outline:none;width:100%;height:2.8rem;color:#0056ad;background:none; font-size:1rem;}
        #form-area .btn-submit{width:100%;border:none;outline:none;height:3.07rem;font-size:1.78rem;letter-spacing:1rem;background: url(/images/nsc_m/login/nsc_login-btn.png) no-repeat center;border-radius: .2rem;    padding-bottom:.5rem;}
        #form-area label img{position:absolute;}
        #form-area label[for='uname'] img{width:1.85rem;left:0.9rem;top:0.5rem;}
        #form-area label[for='upass'] img{width:1.35rem;left:1.15rem;top:0.6rem;}
        #form-area label[for='code'] img{width:1.85rem;left:0.9rem;top:0.5rem;}
        #form-area .validate-code{position:relative;}
        #dvcode{position:absolute;right:0;top:0;z-index:99;height: 2.96rem; width: 4rem;border-bottom-right-radius: .2rem;border-top-right-radius: .2rem;}
        footer .tip-messages{text-align:center;font-size:0.7rem;color:#ae9287;margin:2.2rem 0 4rem;}
        footer .download-sticky{position:fixed;z-index: 101;left:0;bottom:0;width:100%;height:2.92rem;background:url(/images/nsc_m/login/down_bg.png) repeat;}
        footer .download-sticky ul{display:block;margin-top:0.5rem;overflow:hidden;}
        footer .download-sticky li{float:left;color:#fff;font-size:0.89rem;}
        footer .download-sticky li span{vertical-align:middle;}
        footer .download-sticky li img{vertical-align:middle;}
        footer .download-sticky a{text-decoration:none;color:#fff;}
        footer .download-sticky .close-btn img{width:0.8rem;margin:0.55rem 0 0 0.5rem;}
        footer .download-sticky .down-logo img{width:2rem;margin-left:1.7rem;margin-right:0.7rem;}
        footer .download-sticky .platform-icon{float:right;margin-right:0.8rem;}
        footer .download-sticky .platform-icon img{width:4.67rem;vertical-align:-0.6rem;}
    </style>
	<!--<script>alert('諮詢QQ：925475');</script>-->
    <script type="text/javascript">
        ;(function(win){
            var doc = win.document;
            var docEl = doc.documentElement;
            var tid,rem,initialFontSize = 27,initialWidth = 675;
            refreshRem();
            win.addEventListener('resize', function() {
                clearTimeout(tid);
                tid = setTimeout(refreshRem, 300);
                fnCheckMobile();
            }, false);

            win.addEventListener('pageshow',function(e){
                if(e.persisted){
                    clearTimeout(tid);
                    tid = setTimeout(refreshRem, 300);
                    fnCheckMobile();
                }
            }, false);

            function refreshRem(){
                var width = docEl.getBoundingClientRect().width,
                    height = docEl.getBoundingClientRect().height;
                var orientation = width>height?"landscape":"portrait";
                if(orientation === "landscape"){
                    rem = height*initialFontSize/initialWidth;
                }else{
                    if(width > 540)width = 540;
                    rem = width*initialFontSize/initialWidth;
                }
                docEl.style.fontSize = rem + 'px';
            }
        })(window);

                window.onload = function(){
            var isLoginNow = true;
            var events = {
              
                "submit form":fnFormSubmit,//表單提交
                "blur #username":fnCheckUname,//帳號名驗證
                "blur #password":fnCheckUpass,//密碼驗證
                "blur #vcode":fnCheckCode,//驗證碼
                "click #dvcode":refreshimg//刷新驗證碼
            }
            if(typeof Object.keys === "function"){
                Object.keys(events).forEach(function(ele,index){
                    var eventDetail = ele.split(" ");
                    var eventType = eventDetail[0],
                        eventListener = events[ele],
                        selector = document.querySelectorAll(eventDetail[1]);
                    [].forEach.call(selector,function(ele,index){
                        ele.addEventListener(eventType,eventListener,false);
                    });
                });
            }else{
                for(var key in events){
                    var eventDetail = key.split(" ");
                    var eventType = eventDetail[0],
                        eventListener = events[key],
                        selector = document.querySelectorAll(eventDetail[1]);
                    for(var i = 0;i<selector.length;i++){
                        selector[i].addEventListener(eventType,eventListener,false);
                    }
                }
            }
          
            function fnFormSubmit(e){//表單提交
                e.preventDefault();
                var passedArr = [],valArr = [];
                [].forEach.call(this.querySelectorAll("input"),function(ele,index){
                    var val = ele.value;
                    var tPassed = !(val === "" || ele.classList.contains("has-error"));
                    passedArr.push(tPassed);
                    valArr.push(val);
                });
                if(passedArr.indexOf(false) > -1){
                    layer.open({
                        content:"請正確填寫完整的資訊",
                        btn:"確定"
                    });
                }else{
                   // LoginNow(valArr[0],valArr[1],valArr[2]);
                }
            }
            function fnCheckUname(){//驗證帳號名
                var uname = this.value;
                if(uname === " " || !uname){
                    this.setAttribute("placeholder","帳號名不能為空");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function fnCheckUpass(){//驗證密碼
                var upass = this.value;
                if(upass === " " || !upass){
                    this.setAttribute("placeholder","密碼不能為空");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function fnCheckCode(){//驗證碼核對
                var code = this.value;
                if(code === " " || !code){
                    this.setAttribute("placeholder","驗證碼不能為空");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function refreshimg(){
                var url = "/index.php/user/vcode/" + (new Date()).getTime();
                document.querySelector("#dvcode").src = url;
            }

        }
    </script>
<link href="/js/nsc_m/libs/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss"></head>
<body>
    <div class="container">
        <header><div id="head" style="height:198px;"></div><!--<img src="/images/nsc_m/login/logo.png?v=1.17.1.12" alt="logo">-->
        </header>
        <section id="form-area">
            <form action="/index.php/user/logined" method="post" onajax="userBeforeLogin" enter="true" call="userLogin" target="ajax">
                <dl>
                    <dd><input type="text" id="username" name="username" placeholder="輸入帳號"></dd>
                </dl>
                <dl>
                   
                    <dd><input type="password" id="password" name="password" placeholder="輸入密碼"></dd>
                </dl>
                <dl>
                    
                    <dd class="validate-code">
                        <input type="text" id="vcode" name="vcode" maxlength="4" placeholder="輸入驗證碼" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        <img title="點擊刷新" style="cursor:pointer;" id="dvcode" name="dvcode" src="/index.php/user/vcode/<?=$this->time?>">
                    </dd>
                </dl>
                <dl>
                <button class="btn-submit" type="submit" data-form-sbm="1483930096400.321"></button>
                </dl>
            </form>
        </section>
        <footer>
            <div class="tip-messages">
                未滿18周歲禁止購買<br>
                Copyright © 2020  阿舍仔娛樂城版權所有
            </div>
      
        </footer>
    </div>
    <script type="text/javascript" src="/js/nsc_m/libs/layer.js?v=1.17.1.12"></script>
</body></html>
