/** 報表查詢 **/

function huodong(){
	
layer.alert(('暫未開通老虎機，真人娛樂通道！'),{icon: 2,title :'消息提示'});

}

/** 手機介面展示 **/

function huodong1(){
	
layer.alert(('暫時沒有最新活動！'),{icon: 2,title :'消息提示'});

}

/** 未開通彩種，以及其他玩法等一系列彈窗方式 **/

function tip(){
	
layer.alert(('暫未開放，敬請期待！'),{icon: 5,title :'消息提示'});

}

/** 線上客服彈層**/

function zxkf(){
	
layer.open({
  type: 2,
  title: '線上客服',
  shadeClose: true,
  shade: 0.8,
  area: ['700px', '600px'],
  content: '../welive/index.html'
})
}

/** 娛樂通道未開通提示 **/

function tipzr(){
	
layer.alert(('該通道暫未開通，盡情期待！'),{icon: 4,title :'消息提示'});

}

/** 登錄密碼修改彈層 **/

function dlmm(){
	
layer.open({
  type: 2,
  title: '修改登錄密碼',
  shadeClose: true,
  shade: 0.8,
  area: ['600px', '350px'],
  content: '/index.php/user/pass'
})
}

/** 資金密碼修改彈層 **/

function zjmm(){
	
layer.open({
  type: 2,
  title: '修改資金密碼',
  shadeClose: true,
  shade: 0.8,
  area: ['600px', '350px'],
  content: '/index.php/safe/passwd'
})
}

/** 安全中心功能暫未開通 **/

function aqzx(){
	
layer.alert(('正在升級，近期開放！'),{icon: 5,title :'消息提示'});

}

/** 暱稱功能彈出層 **/

function ncgn(){
	
layer.open({
  type: 2,
  title: '修改暱稱',
  shadeClose: true,
  shade: 0.8,
  area: ['600px', '350px'],
  content: '/index.php/user/nickname'
})
}

/** 單號彈層信息 **/

function dhxx(){
	
layer.open({
  type: 2,
  title: '修改暱稱',
  shadeClose: true,
  shade: 0.8,
  area: ['600px', '350px'],
  content: '/index.php/user/nickname'
})
}

/** 歷史開獎滑鼠指向下拉效果 **/

function MM_over(mmObj) {
	var mSubObj = mmObj.getElementsByTagName("div")[0];
	mSubObj.style.display = "block";
	mSubObj.style.backgroundColor = "#000";
	mSubObj.style.margin = "0px -200px";
}
function MM_out(mmObj) {
	var mSubObj = mmObj.getElementsByTagName("div")[0];
	mSubObj.style.display = "none";
	
}
/** 購彩頁面-訂單快查介面 **/

function ddjl(){
	
layer.open({
  type: 2,
  title: '訂單記錄',
  shadeClose: true,
  shade: 0.8,
  area: ['950px', '450px'],
  content: '/record/searchome'
})
}
/**
 * 滑鼠點擊懸浮效果
 */
$(document).ready(function() {
	var show = function() {
		$(this).children('.money').hide();
		$(this).find('.hover').show();
	}
	var hide = function() {
		$(this).children('.money').show();
		$(this).find('.hover').hide();
	}
	$('.game-result > .list > .item').hover(show, hide);
});
function transferGame(platformCode){
	var url = "./game-center/play";
	$.ajax({
		type : 'post',
		url : url,
		dataType:"html",
		data : {
			platformCode : platformCode
		},
		success : function(data) {
			window.location.href=data; 
		}
	});
}

function Alert(msg) {
	xingcai(msg);
}
function thisMovie(movieName) {
	 if (navigator.appName.indexOf("Microsoft") != -1) {   
		 return window[movieName];   
	 } else {   
		 return document[movieName];   
	 }   
 } 
function copyFun(ID) {
	thisMovie(ID[0]).getASVars($("#"+ID[1]).attr('value'));
}

/**
 * 滑鼠點擊懸浮效果
 */
$(document).ready(function() {
	var show = function() {
		$(this).children('.logo').hide();
		$(this).children('.money').hide();
		$(this).find('.hover').stop().fadeIn(200);
	}
	var hide = function() {
		$(this).children('.logo').show();
		$(this).children('.money').show();
		$(this).find('.hover').stop().fadeOut(200);
	}
	$('.game-list .item').hover(show, hide);
});

/*	平臺介紹執行 */
(function($) {
    $.fn.Slide = function(options) {
        var opts = $.extend({},
        $.fn.Slide.deflunt, options);
        var index = 1;
        var targetLi = $("." + opts.claNav + " li", $(this));
        var clickNext = $("." + opts.claNav + " .next", $(this));
        var clickPrev = $("." + opts.claNav + " .prev", $(this));
        var ContentBox = $("." + opts.claCon, $(this));
        var ContentBoxNum = ContentBox.children().size();
        var slideH = ContentBox.children().first().height();
        var slideW = ContentBox.children().first().width();
        var autoPlay;
        var slideWH;
        if (opts.effect == "scroolY" || opts.effect == "scroolTxt") {
            slideWH = slideH;
        } else if (opts.effect == "scroolX" || opts.effect == "scroolLoop") {
            ContentBox.css("width", ContentBoxNum * slideW);
            slideWH = slideW;
        } else if (opts.effect == "fade") {
            ContentBox.children().first().css("z-index", "1");
        }
        return this.each(function() {
            var $this = $(this);
            var doPlay = function() {
                $.fn.Slide.effect[opts.effect](ContentBox, targetLi, index, slideWH, opts);
                index++;
                if (index * opts.steps >= ContentBoxNum) {
                    index = 0;
                }
            };
            clickNext.click(function(event) {
                $.fn.Slide.effectLoop.scroolLeft(ContentBox, targetLi, index, slideWH, opts,
                function() {
                    for (var i = 0; i < opts.steps; i++) {
                        ContentBox.find("li:first", $this).appendTo(ContentBox);
                    }
                    ContentBox.css({
                        "left": "0"
                    });
                });
                event.preventDefault();
            });
            clickPrev.click(function(event) {
                for (var i = 0; i < opts.steps; i++) {
                    ContentBox.find("li:last").prependTo(ContentBox);
                }
                ContentBox.css({
                    "left": -index * opts.steps * slideW
                });
                $.fn.Slide.effectLoop.scroolRight(ContentBox, targetLi, index, slideWH, opts);
                event.preventDefault();
            });
            if (opts.autoPlay) {
                autoPlay = setInterval(doPlay, opts.timer);
                ContentBox.hover(function() {
                    if (autoPlay) {
                        clearInterval(autoPlay);
                    }
                },
                function() {
                    if (autoPlay) {
                        clearInterval(autoPlay);
                    }
                    autoPlay = setInterval(doPlay, opts.timer);
                    if ($("#Html5Video").attr('_isplaying')) {
                        clearInterval(autoPlay);
                    }
                });
            }
           
            targetLi.click(function() {
                index = targetLi.index(this);
                window.setTimeout(function() {
                    $.fn.Slide.effect[opts.effect](ContentBox, targetLi, index, slideWH, opts);
                },
                10);
            });
        });
    };
    $.fn.Slide.deflunt = {
        effect: "scroolY",
        autoPlay: true,
        speed: "normal",
        timer: 1000,
        defIndex: 0,
        claNav: "bannermenu",
        claCon: "caseul",
        steps: 1
    };
    $.fn.Slide.effectLoop = {
        scroolLeft: function(contentObj, navObj, i, slideW, opts, callback) {
            contentObj.animate({
                "left": -i * opts.steps * slideW
            },
            opts.speed, callback);
            if (navObj) {
                navObj.eq(i).addClass("on").siblings().removeClass("on");
            }
        },
        scroolRight: function(contentObj, navObj, i, slideW, opts, callback) {
            contentObj.stop().animate({
                "left": 0
            },
            opts.speed, callback);
        }
    }
    $.fn.Slide.effect = {
        fade: function(contentObj, navObj, i, slideW, opts) {
            contentObj.children().eq(i).stop().animate({
                opacity: 1
            },
            opts.speed).css({
                "z-index": "1"
            }).siblings().animate({
                opacity: 0
            },
            opts.speed).css({
                "z-index": "0"
            });
            navObj.eq(i).addClass("on").siblings().removeClass("on");
        },
        scroolTxt: function(contentObj, undefined, i, slideH, opts) {
            contentObj.animate({
                "margin-top": -opts.steps * slideH
            },
            opts.speed,
            function() {
                for (var j = 0; j < opts.steps; j++) {
                    contentObj.find("li:first").appendTo(contentObj);
                }
                contentObj.css({
                    "margin-top": "0"
                });
            });
        },
        scroolX: function(contentObj, navObj, i, slideW, opts, callback) {
            contentObj.stop().animate({
                "left": -i * opts.steps * slideW
            },
            opts.speed, callback);
            if (navObj) {
                navObj.eq(i).addClass("on").siblings().removeClass("on");
            }
        },
        scroolY: function(contentObj, navObj, i, slideH, opts) {
            contentObj.stop().animate({
                "top": -i * opts.steps * slideH
            },
            opts.speed);
            if (navObj) {
                navObj.eq(i).addClass("on").siblings().removeClass("on");
            }
        }
    };
})(jQuery);
/* 選項卡執行-遊戲介紹 */
;( function( window ) {
	
	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function CBPFWTabs( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	CBPFWTabs.prototype.options = {
		start : 0
	};

	CBPFWTabs.prototype._init = function() {
		// tabs elemes
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.content > section' ) );
		// current index
		this.current = -1;
		// show current content item
		this._show();
		// init events
		this._initEvents();
	};

	CBPFWTabs.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	CBPFWTabs.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = '';
			this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'tab-current';
		this.items[ this.current ].className = 'content-current';
	};

	// add to global namespace
	window.CBPFWTabs = CBPFWTabs;

})( window );


// 首頁-幻燈片執行


 $(function() {
        var bannerSlider = new Slider($('#banner_tabs'), {
            time: 5000,
            delay: 400,
            event: 'hover',
            auto: true,
            mode: 'fade',
            controller: $('#bannerCtrl'),
            activeControllerCls: 'active'
        });
        $('#banner_tabs .flex-prev').click(function() {
            bannerSlider.prev()
        });
        $('#banner_tabs .flex-next').click(function() {
            bannerSlider.next()
        });
    })


/* 首頁-幻燈片執行 */


; $(function ($, window, document, undefined) {
    
    Slider = function (container, options) {

        "use strict"; //stirct mode not support by IE9-

        if (!container) return;

        var options = options || {},
            currentIndex = 0,
            cls = options.activeControllerCls,
            delay = options.delay,
            isAuto = options.auto,
            controller = options.controller,
            event = options.event,
            interval,
            slidesWrapper = container.children().first(),
            slides = slidesWrapper.children(),
            length = slides.length,
            childWidth = container.width(),
            totalWidth = childWidth * slides.length;

        function init() {
            var controlItem = controller.children();

            mode();

            event == 'hover' ? controlItem.mouseover(function () {
                stop();
                var index = $(this).index();

                play(index, options.mode);
            }).mouseout(function () {
                isAuto && autoPlay();
            }) : controlItem.click(function () {
                stop();
                var index = $(this).index();

                play(index, options.mode);
                isAuto && autoPlay();
            });

            isAuto && autoPlay();
        }

        //animate mode
        function mode() {
            var wrapper = container.children().first();

            options.mode == 'slide' ? wrapper.width(totalWidth) : wrapper.children().css({
                'position': 'absolute',
                'left': 0,
                'top': 0
            })
                .first().siblings().hide();
        }

        //auto play
        function autoPlay() {
            interval = setInterval(function () {
                triggerPlay(currentIndex);
            }, options.time);
        }

        //trigger play
        function triggerPlay(cIndex) {
            var index;

            (cIndex == length - 1) ? index = 0 : index = cIndex + 1;
            play(index, options.mode);
        }

        //play
        function play(index, mode) {
            slidesWrapper.stop(true, true);
            slides.stop(true, true);

            mode == 'slide' ? (function () {
                if (index > currentIndex) {
                    slidesWrapper.animate({
                        left: '-=' + Math.abs(index - currentIndex) * childWidth + 'px'
                    }, delay);
                } else if (index < currentIndex) {
                    slidesWrapper.animate({
                        left: '+=' + Math.abs(index - currentIndex) * childWidth + 'px'
                    }, delay);
                } else {
                    return;
                }
            })() : (function () {
                if (slidesWrapper.children(':visible').index() == index) return;
                slidesWrapper.children().fadeOut(delay).eq(index).fadeIn(delay);
            })();

            try {
                controller.children('.' + cls).removeClass(cls);
                controller.children().eq(index).addClass(cls);
            } catch (e) { }

            currentIndex = index;

            options.exchangeEnd && typeof options.exchangeEnd == 'function' && options.exchangeEnd.call(this, currentIndex);
        }

        //stop
        function stop() {
            clearInterval(interval);
        }

        //prev frame
        function prev() {
            stop();

            currentIndex == 0 ? triggerPlay(length - 2) : triggerPlay(currentIndex - 2);

            isAuto && autoPlay();
        }

        //next frame
        function next() {
            stop();

            currentIndex == length - 1 ? triggerPlay(-1) : triggerPlay(currentIndex);

            isAuto && autoPlay();
        }

        //init
        init();

        //expose the Slider API
        return {
            prev: function () {
                prev();
            },
            next: function () {
                next();
            }
        }
    };

}(jQuery, window, document));


	/*  首頁-平臺介紹類目  */

$(document).ready(function(){

	$(".serBox").hover(function(){
		$(this).children().stop(false,true);
		$(this).children(".serBoxOn").fadeIn("slow");
		$(this).children(".pic1").animate({right: -110},400);
		$(this).children(".pic2").animate({left: 105},400);
		$(this).children(".txt1").animate({left: -240},400);
		$(this).children(".txt2").animate({right: 40},400);	 
	},function(){
		$(this).children().stop(false,true);
		$(this).children(".serBoxOn").fadeOut("slow");
		$(this).children(".pic1").animate({right:105},400);
		$(this).children(".pic2").animate({left: -110},400);
		$(this).children(".txt1").animate({left: 40},400);
		$(this).children(".txt2").animate({right: -240},400);	
	});
	
});	
	
function serFocus(i){
	$(".servicesPop").slideDown("normal");
	changeflash(i);
}
function closeSerPop(){
	$(".servicesPop").slideUp("fast");
}

var currentindex=1;
function changeflash(i){	
	currentindex=i;
	for (j=1;j<=6;j++){
		if(j==i){
			$("#flash"+j).fadeIn("normal");
			$("#flash"+j).css("display","block");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("dq");
		}else{
			$("#flash"+j).css("display","none");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("no");
		}
	}
}
/*  財務中心-提現介面-判斷數位是否填寫確定按鈕判斷 */

/*  財務中心-提現介面-確定按鈕點擊後跳轉 */

function toCash(err, data){
	if(err){
		xingcai(err)
	}else{
		reloadMemberInfo();
		$(':password').val('');
		$('input[name=amount]').val('');
		window.location.href="/index.php/cash/toCashResult";
		xingcai(data);
		$.messager.lays(200, 100);
	    $.messager.anim('fade', 1000);
	    $.messager.show("<strong>系統提示</strong>", "提款成功！<br />將在20分鐘內到賬！",0);

	}
}
$(function(){
	$('input[name=amount]').keypress(function(event){
		event.keyCode=event.keyCode||event.charCode;
		
		return !!(
			// 數字鍵
			(event.keyCode>=48 && event.keyCode<=57)
			|| event.keyCode==13
			|| event.keyCode==8
			|| event.keyCode==46
			|| event.keyCode==9
		)
	});
	
	//var form=$('form')[0];
	//form.account.value='';
	//form.username.value='';
});
function showPaymentFee() {
   $("#ContentPlaceHolder1_txtMoney").val($("#ContentPlaceHolder1_txtMoney").val().replace(/\D+/g, ''));
   jQuery("#chineseMoney").html(changeMoneyToChinese($("#ContentPlaceHolder1_txtMoney").val()));
        }
/*  財務中心-儲值介面-記錄執行在指定框架內函數 */
function toCash(err, data){
	//console.log(err);
	if(err){
		xingcai(err)
		$("#vcode").trigger("click");
	}else{
		$(':password').val('');
		$('input[name=amount]').val('');
		$('.recharege-leibie').html(data);
	}
}
/*  財務中心-儲值介面-複製帳戶名以及卡號等資料的彈窗以及複製功能 */

function Alert(msg) {
	xingcai(msg);
}
function thisMovie(movieName) {
	 if (navigator.appName.indexOf("Microsoft") != -1) {   
		 return window[movieName];   
	 } else {   
		 return document[movieName];   
	 }   
 } 
function copyFun(ID) {
	thisMovie(ID[0]).getASVars($("#"+ID[1]).attr('value'));
}
/*  財務中心-儲值介面-確定按鈕執行在框架內 */
function showPaymentFee() {
   $("#ContentPlaceHolder1_txtMoney").val($("#ContentPlaceHolder1_txtMoney").val().replace(/\D+/g, ''));
   jQuery("#chineseMoney").html(changeMoneyToChinese($("#ContentPlaceHolder1_txtMoney").val()));
        }
/*  財務中心-儲值介面-儲值框內填寫金額判定 */
function checkRecharge(){
	if(!this.amount.value) throw('請填寫儲值金額');
	//showPaymentFee();
	//if(isNaN(amount)) throw('儲值金額錯誤');
	//if(!this.amount.value.match(/^\d+(\.\d{0,2})?$/)) throw('儲值金額錯誤');
	showPaymentFee();
	var amount=parseInt(this.amount.value),
	$this=$('input[name=amount]',this),
	min=parseInt($this.attr('min')),
	max=parseInt($this.attr('max'));
	min1=parseInt($this.attr('min1')),
	max1=parseInt($this.attr('max1'));
	
	if($('input[name=mBankId]').val()==2||$('input[name=mBankId]').val()==3){
		if(amount<min1) throw('支付寶/財付通儲值金額最小為'+min1+'元');
		if(amount>max1) throw('支付寶/財付通儲值金額最多限額為'+max1+'元');
		showPaymentFee();
	}else{
		if(amount<min) throw('儲值金額最小為'+min+'元');
		if(amount>max) throw('儲值金額最多限額為'+max+'元');
		showPaymentFee();

	}
	if(!this.vcode.value) throw('請輸入驗證碼');
	if(this.vcode.value<4) throw('驗證碼至少4位');
	showPaymentFee();
}

/*  代理中心-盈虧統計-記錄執行在指定框架內函數 */
$(function(){
	$('.search form input[name=username]')
	.focus(function(){
		if(this.value=='帳號名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='帳號名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});

	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});

	//$('.bottompage a[href]').live('click', function(){
		$('.result').load($(this).attr('href'));
		return false;
	});
//});
function searchData(err, data){
	if(err){
		xingcai(err);
	}else{
		$('.result').html(data);
	}
}
/*  代理中心-遊戲記錄-記錄執行在指定框架內函數 */
$(function(){
	$('.search form input[name=username]')
	.focus(function(){
		if(this.value=='帳號名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='帳號名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.search form input[name=betId]')
	.focus(function(){
		if(this.value=='輸入單號') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='輸入單號';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});
	
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});
	
	//$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});

//});
function recordSearch(err, data){
	if(err){
		xingcai(err);
	}else{
		$('.result').html(data);
	}
}
function recodeRefresh(){
	$('.result').load(
		$('.bottompage .pagecurrent').attr('href')
	);
}

function deleteBet(err, code){
	if(err){
		xingcai(err);
	}else{
		recodeRefresh();
	}
}

/*  代理中心-賬變記錄-記錄執行在指定框架內事件 */
$(function(){
	$('.search form input[name=username]')
	.focus(function(){
		if(this.value=='帳號名') this.value='';
	})
	.blur(function(){
		if(this.value=='') this.value='帳號名';
	})
	.keypress(function(e){
		if(e.keyCode==13) $(this).closest('form').submit();
	});

	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});

	//$('.bottompage a[href]').live('click', function(){
		$('.result').load($(this).attr('href'));
		return false;
	});
//});
function searchCoinLog(err, data){
	if(err){
		xingcai(err);
	}else{
		$('.result').html(data);
	}
}
function xingcai(tips,style,minH){
  layer.open({
  icon: 9,
  content: (tips) ,
  btn:"確定"
});
}

