;(function(win){
            var doc = win.document;
            var docEl = doc.documentElement;
            var tid,rem,initialFontSize = 24,initialWidth = 640;
            refreshRem();
            win.addEventListener('resize', function() {
                clearTimeout(tid);
                tid = setTimeout(refreshRem, 300);
                // fnCheckMobile();
            }, false);

            win.addEventListener('pageshow',function(e){
                if(e.persisted){
                    clearTimeout(tid);
                    tid = setTimeout(refreshRem, 300);
                    // fnCheckMobile();
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

    document.addEventListener("DOMContentLoaded", function(){
        (function(){
            var _btn  = document.querySelector(".btn-slide-bar"),
                _body = document.querySelector("#body");
                _tbody = document.querySelector(".shady")
                var b = 1;
                _btn.onclick = function(){
                    b = 2;
                    var docH = $(window).height();
                    var navH = $(".header").height();
                    var centH = docH;
                    $(".wraper-page").height(centH);
                    $(".wraper-page").css('overflow','hidden');
                    $(".home_b").css('display','block');
                    $(".slide-bar").css('display','block');
                    _body.classList.toggle("active");
                    $(".shady").fadeIn();

                    $("body").css('overflow-x','hidden');
                }
                _tbody.onclick = function(){
                    if(b==2){
                        b=1;
                        $(".wraper-page").css({'overflow':'visible','height':''});
                        _body.classList.toggle("active");
                        
                        $(".shady").fadeOut(300,function(){
                            $(".slide-bar").css('display','none');
                            $(".home_b").css('display','none');
                             $("body").css('overflow-x','visible')
                        });
                    }
                }
        })(window)
    },false);

//新增投注跳到下麵
// $(window).scroll(function(){
//     if($(window).scrollTop()>150){
//         $('.m_f_top').fadeIn(0)
//     }else{
//         $('.m_f_top').fadeOut(0)
//     }
// })
$('.m_f_top').click(function(){
    $('body').animate({scrollTop:0},300);
});
//菜單折疊 
    $(function(){
        var h3 = $(".tree_box").find("h3");
        var tree_one = $(".tree_box").find(".tree_one");
        var h4 = $(".tree_one").find("h4");
        var tree_two = $(".tree_one").find(".tree_two");
            h3.each(function(i){
                $(this).click(function(){
                    tree_one.eq(i).slideToggle(100,function(){
                    });
                    $(this).siblings("i").addClass("lnstruction-up");
                    tree_one.eq(i).parent().siblings().find(".tree_one").slideUp(100);
                })
            })
            h4.each(function(i){
                $(this).click(function(){
                    tree_two.eq(i).slideToggle(200,function(){
                    });
                    tree_two.eq(i).parent().siblings().find(".tree_two").slideUp();
                })
            })
    });
    //計算盒子高度 
//返回上一頁
//隱藏金額
        (function(){
            var $ref = $("#refff"),$refresh = $(".ic-refresh"),$showMoney = $(".show-money"),$hideMoney = $(".hide-money");
                $hide = $(".ic-unlook");
            var cvis = getCookie("hide");
            if(cvis === "true"){
                $showMoney.hide();
                $hideMoney.show();
                $refresh.css("display","none");
                $hide.addClass("hide");
                $hide.attr("title","顯示餘額");
            }else{
                $refresh.css("display","inline-block");
                $hide.attr("title","隱藏餘額");
                $showMoney.show();
                $hideMoney.hide();
            }
            $hide.on("click",function(){ 
                var vis = $showMoney.css("display");
                if(vis == "none"){
                    setCookie("hide","false");
                    $showMoney.show();
                    $hideMoney.hide();
                    $refresh.css("display","inline-block");
                    $hide.removeClass("hide");
                    $hide.attr("title","隱藏餘額");        
                    refreshMoney();
                }else{
                    setCookie("hide","true");
                    $showMoney.hide();
                    $hideMoney.show();  
                    $refresh.css("display","none");
                    $hide.addClass("hide");
                    $hide.attr("title","顯示餘額");
                }
            });
            var pormpt = getCookie("sex")
            if(pormpt == "true"){
                $(".m-prompt").hide(0);
            }else{
               $(".m-prompt").show(0);
            }
            $(".m-prompt a").on("click",function(){
                setCookie("sex","true");
                $(".m-prompt").hide();
            })
            refreshMoney()
        })();
        //獲取資金
        function refreshMoney() {
                $.ajax({
                    type : 'POST',
                    url  : '/index.php/safe/userInfo',
                    data : 'flag=getmoney',
                    timeout : 10000,
                    success : function(data){
                        autoRefresh = true;
                        if( data == "error" ) {//
                            $("#refff").html("<b>正在與server連接</b>");
                            return false;
                        } else {
                            if(isNaN(data)){
                                layer.open({
                                    content:"連線失敗，您的登錄可能已經過期，請重新登錄",
                                    btn:'確定',
                                    yes:function(index){
                                        location.href="/";
                                        layer.close(index)
                                    }
                                })
                                return false;
                            }else{
                                $("#refff").html('<b>' + ''+ moneyFormat(data).substr(0,14)).attr("title",moneyFormat(data));
                                return true;
                            }
                        }
                    },
                    error: function() {
                        $("#refff").html("正在讀取資金");
                    },
                    complete:function(XHR,textStatus){
                        //console.log(XHR);
                        XHR = null;
                        //console.log(XHR);
                    }
                });  
            }
        //帳號名長度限制
        (function(){
            var $uname = $(".username");
            var name = $uname.text().replace(/\s/g,"")
                ,len = name.length;
            if(len >8){
                name = name.substr(0,8)+"...";
                $uname.text(name);
            }
        })();
    

// 新彩種未上線調用彈層

	function comingsoon(){
		layer.open({
			content:'即將上線，敬請期待',
			btn:['確定']

		})
	}
//倒序  彩票走勢圖 倒序
/*(function($) {
    $.extend({
        reverseChild : function(obj, child) { 
            var childObj = $(obj).find(child);
            var total = childObj.length; 

            childObj.each(function(i) { 
                $(obj).append(childObj.eq((total-1)-i)); 
            }); 

            //console.log(childObj.html()); 
        }
    });
})(jQuery);
function maskList() {
    $.reverseChild("#chartsTable", 'tr');
    $.reverseChild("#codeTable", 'tr');
    $("#codeTable").show();
    $("#chartsTable").show();
}
$(function() { 
    maskList();
}());*/
//倒序 end 彩票走勢圖 倒序
// 投注頁面彈出歷史開獎
// var list_Rec = $("#m_vi_recLott").html();
// $("#m_recen_v").click(function(){
//      $("#m_vi_recLott").toggle();

// });
function m_loginout(){
            layer.open({
                content:'您需要退出帳號嗎？',
                btn:['退出','取消'],
                yes:function(){
                    window.location.href='/index.php/user/logout'
                }
            })
        }
$(function(){
     //後退 back
      $('.m-return').click(function(){
        var backUrl = document.referrer;
        document.location.href = backUrl;
    });
})
// 近期開獎關閉按鈕

