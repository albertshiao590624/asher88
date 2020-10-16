$(function(){

	//{{{ HTML標籤擴展部分
	// A連結擴展
	/**
	 * AJAX連結
	 * target="ajax"：AJAX請求
	 * onajax：AJAX調用前觸發，返回false時阻止
	 * call：AJAX完後觸發，callback(err, data, xhr) this指向當前html元素，err當出錯的時間有值，data為伺服器返回值(解析過)，xhr為HttpRequest對象
	 * dataType：默認html，伺服器回應類型，可用json，xml
	 */
	$('a[target=ajax]').live('click', function(){
		var $this	= $(this),
		self		= this,
		onajax		= window[$this.attr('onajax')],
		title		= $this.attr('title'),
		call		= window[$this.attr('call')];
		
		if(title && !confirm(title))
		 return false;
		
		if(typeof call!='function'){
			// 設置一個默認的響應回檔
			call=function(){}
		}
		
		if('function'==typeof onajax){
			// 如果ajax請求前事件處理返回false
			// 則阻止後繼事件
			try{
				if(onajax.call(this)===false) return false;
			}catch(err){
				call.call(self, err);
				return false;
			}
		}

		$.ajax({
			url:$this.attr('href'),
			
			// 非同步請求
			async:true,
			
			// 把當前存儲的資料做為參數傳遞
			data:$this.data(),
			
			// 預設用GET請求，也可以用method屬性設置
			type:$this.attr('method')||'get',
			
			// dataType屬性用於設置回應資料格式，預設html，可選json和xml
			dataType:$this.attr('dataType')||'html',
			
			error:function(xhr, textStatus, errThrow){
				// 據jQuery官方說，textStatus和errThrow中只有一個包括錯誤資訊
				call.call(self, errThrow||textStatus);
			},
			
			success:function(data, textStatus, xhr, headers){
				var errorMessage=xhr.getResponseHeader('X-Error-Message');
				if(errorMessage){
					call.call(self, decodeURIComponent(errorMessage), data);
				}else{
					call.call(self, null, data);
				}
			}
		});
		
		return false;
	});
	
	// A彈出層打開連結
	/**
	 * target="modal"
	 * title="彈出層標題"
	 * width="彈出寬度"
	 * heigth=""
	 * modal=false
	 * buttons="確定:onsure|取消:oncancel"
	 * method="get"
	 */
	$('a[target=modal]').live('click', function(){
		var self=this,
		$self=$(self),
		title=$self.attr('title')||'',
		width=$self.attr('width')||'auto',
		heigth=$self.attr('heigth')||'auto',
		modal=($self.attr('modal')),
		method=$self.attr('method')||'get',
		buttons=$self.attr('button')||null;

		if(buttons) buttons=buttons.split('|').map(function(b){
			b=b.split(':');
			return {text:b[0], click:window[b[1]]};
		});
		
		$[method]($self.attr('href'), function(html){
			$(html).dialog({
				title:title,
				width:width,
				height:heigth,
				modal:modal,
				buttons:buttons
			});
		});
		
		return false;
	});
	
	// form擴展
	/**
	 * 簡單AJAX表單
	 * target="ajax"：AJAX提交
	 * onajax：AJAX調用前觸發，this指向from元素，返回false時阻止
	 * call：AJAX完後觸發，callback(err, data, xhr) this指向當前html元素，err當出錯的時間有值，data為伺服器返回值(解析過)，xhr為HttpRequest對象
	 * 伺服器回應類型為json
	 */
	$('form[target=ajax]').live('submit', function(){
		var data	= [], 
		$this		= $(this),
		self		= this,
		onajax		= window[$this.attr('onajax')],
		call		= window[$this.attr('call')];
		
		if(typeof call!='function'){
			// 設置一個默認的響應回檔
			call=function(){}
		}
		
		if('function'==typeof onajax){
			// 如果ajax請求前事件處理返回false
			// 則阻止後繼事件
			try{
				if(onajax.call(this)===false) return false;
			}catch(err){
				call.call(self, err);
				return false;
			}
		}

		$(':input[name]', this).each(function(){
			var $this=$(this),
			value=$this.data('value'),
			name=$this.attr('name');
			
			if($this.is(':radio, :checkbox') && this.checked==false) return true;
			
			if(value===undefined) value=this.value;
			
			data.push({name:name, value:value});
		});
		
		$.ajax({
			url:$this.attr('action'),
			
			// 非同步請求
			async:true,

			data:data,
			
			// 預設用GET請求，也可以用method屬性設置
			type:$this.attr('method')||'get',
			
			// dataType屬性用於設置回應資料格式，預設json，可選html、json和xml
			dataType:$this.attr('dataType')||'json',
			
			headers:{"x-form-call":1},
			
			error:function(xhr, textStatus, errThrow){
				// 據jQuery官方說，textStatus和errThrow中只有一個包括錯誤資訊
				call.call(self, errThrow||textStatus);
			},
			
			success:function(data, textStatus, xhr, headers){
				var errorMessage=xhr.getResponseHeader('X-Error-Message');
				if(errorMessage){
					call.call(self, decodeURIComponent(errorMessage), data);
				}else{
					call.call(self, null, data);
				}
			}
		});
		
		return false;
	});
	
	// 登錄按Enter進入
	if(!$.browser.opera && !$.browser.mozilla){
		$('input[name=vcode]').live('keypress', function(event){
			if(event.keyCode==13){
				$(this.form).trigger('submit');
			}
		});
	}
	
	//防止沒調成功

	// 彈出層分頁
	$('.ui-dialog .bottompage a').live('click', function(){
		var $this=$(this);
		$this.closest('.ui-dialog-content').load($this.attr('href'));
		return false;
	});
	LAYER_BOTTOM_RIGHT_STYLE='display: flex;position: absolute;bottom: 0;right: 0;';
	////{{{系統提示 setInterval
	if(typeof(TIP)!='undefined' && TIP){
	setInterval(function(){
		
		parent.reloadMemberInfo();
		$.getJSON('/index.php/Tip/getTKTip', function(tip){
			if(tip){
				if(!tip.flag) return;
				
					var ofset =$("#mainiframe",parent.document).offset();
					var wh =$("#mainiframe",parent.document).width();
					var w = 270;
					var h = 125;
					parent.layer.open({
							skin: 'layui-layer-lan',
							type: 1 //此處以iframe舉例
							,title: ['提款通知<span style="position: absolute;font-family: cursive;font-size: 3vh;top:-3px;right: 10px;" onclick="layer.closeAll()">x</span>','background-color: #FF4351; color:#fff;width:100%;height: 5.6vh;line-height: 5.6vh;text-align: left;']
							,area:[w+'px',h+'px']
							,shade: 0
							,offset: 'rb'
							,content: '<div style="padding:10px;font-size:18px;text-align:center;color:#555;">'+ tip.message +'</div>'								
							,zIndex: parent.layer.zIndex //重點1
							,success: function(layero){
								
								$(layero).find('.layui-m-layersection').attr('style',LAYER_BOTTOM_RIGHT_STYLE).end().find('.layui-m-anim-up').css({width:w,height:h})
								
							}
						});
						
						
				// $("<div>").append(tip.message).dialog({
						// position:['right','bottom'],
						// minHeight:40,
						// title:'系統提示',
						// buttons:''
				// });
			}
		})
	}, 8000);

	setInterval(function(){
		parent.reloadMemberInfo();
	
		$.getJSON('/index.php/Tip/getCZTip', function(tip){
			if(tip){
				if(!tip.flag) return;
				
					var ofset =$("#mainiframe",parent.document).offset();
					var wh =$("#mainiframe",parent.document).width();
					var w = 270;
					var h = 125;
					parent.layer.open({
							skin: 'layui-layer-lan',
							type: 1 //此處以iframe舉例
							,title: ['儲值提示<span style="position: absolute;font-family: cursive;font-size: 3vh;top:-3px;right: 10px;" onclick="layer.closeAll()">x</span>','background-color: #FF4351; color:#fff;width:100%;height: 5.6vh;line-height: 5.6vh;text-align: left;']
							,area:[w+'px',h+'px']
							,shade: 0
							,offset: 'rb'
							,content: '<div style="padding:10px;font-size:18px;text-align:center;color:#555;">'+ tip.message +'</div>'								
							,zIndex: parent.layer.zIndex //重點1
							,success: function(layero){
							
								$(layero).find('.layui-m-layersection').attr('style',LAYER_BOTTOM_RIGHT_STYLE).end().find('.layui-m-anim-up').css({width:w,height:h})
								
							}
						});
		  
				
				// $("<div>").append('消息提示').dialog({
						// position:['right','bottom'],
						// minHeight:40,
						// title:'系統提示',
						// buttons:''
				// });
			}
		})
		
	}, 8000);

	setInterval(function(){
	
	parent.reloadMemberInfo();
		$.getJSON('/index.php/Tip/getZNX', function(tip){
			
			if(tip){
				if(!tip.flag) return;
				var buttons=[];
				tip.buttons.split('|').forEach(function(button){
					button=button.split(':');
					buttons.push({text:button[0], click:window[button[1]]});
				});
				// $("<div>").append(tip.message).dialog({
						// position:['right','bottom'],
						// minHeight:40,
						// title:'溫馨提示',
						// buttons:buttons
				// });
									var ofset =$("#mainiframe",parent.document).offset();
					var wh =$("#mainiframe",parent.document).width();
				
					var w = 270;
					var h = 125;
					parent.layer.open({
							skin: 'layui-layer-lan',
							type: 1 //此處以iframe舉例
							,title: ['消息提示<span style="position: absolute;font-family: cursive;font-size: 3vh;top:-3px;right: 10px;" onclick="layer.closeAll()">x</span>','background-color: #FF4351; color:#fff;width:100%;height: 5.6vh;line-height: 5.6vh;text-align: left;']
							,area:[w+'px',h+'px']
							,shade: 0
							,offset: 'rb'
							,content: '<div style="padding:10px;font-size:18px;text-align:center;color:#555;">'+ tip.message +'</div>'								
							,zIndex: parent.layer.zIndex //重點1
							,success: function(layero){
							
								$(layero).find('.layui-m-layersection').attr('style',LAYER_BOTTOM_RIGHT_STYLE).end().find('.layui-m-anim-up').css({width:w,height:h})
								
							}
					});
			}
		})
	
	}, 10000);
	
	
	
	

	
	
	
	
	
	
	}
});


Number.prototype.round=Number.prototype.toFixed;


function changeMoneyToChinese( money )
{
var cnNums = new Array("零","壹","貳","三","肆","伍","陸","柒","捌","玖"); //漢字的數位
var cnIntRadice = new Array("","拾","佰","仟"); //基本單位
var cnIntUnits = new Array("","萬","億","兆"); //對應整數部分擴展單位
var cnDecUnits = new Array("角","分","毫","厘"); //對應小數部分單位
var cnInteger = "整"; //整數金額時後面跟的字元
var cnIntLast = "元"; //整型完以後的單位
var maxNum = 999999999999999.9999; //最大處理的數位

var IntegerNum; //金額整數部分
var DecimalNum; //金額小數部分
var ChineseStr=""; //輸出的中文金額字串
var parts; //分離金額後用的陣列，預定義

if( money == "" ){
return "";
}

money = parseFloat(money);
//alert(money);
if( money >= maxNum ){
$.alert('超出最大處理位數');
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
zeroCount = 0; //歸零
ChineseStr += cnNums[parseInt(n)]+cnIntRadice[m];
}
if( m==0 && zeroCount<4 ){
ChineseStr += cnIntUnits[q];
}
}
ChineseStr += cnIntLast;
//整型部分處理完畢
}
if( DecimalNum!= '' ){//小數部分
decLen = DecimalNum.length;
for( i=0; i<decLen; i++ ){
n = DecimalNum.substr(i,1);
if( n != '0' ){
ChineseStr += cnNums[Number(n)]+cnDecUnits[i];
}
}
}
if( ChineseStr == '' ){
ChineseStr += cnNums[0]+cnIntLast+cnInteger;
}
else if( DecimalNum == '' ){
ChineseStr += cnInteger;
}
return ChineseStr;

}
