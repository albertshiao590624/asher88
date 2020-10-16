

var downCount = 0;
var actionNo;
var stop;
var actionTime;
var nowTime;
// getBoss();
function downCountS(){
		var Minutes; //分
		var second;  //秒
		 //倒计时
			// 倒计时为0 去请求服务器
			if(downCount == 0){
				var date = getQiHao();
		 		// console.log(date);
				// alert(downCount);
				downCount = date.kjsj - date.dates;
				actionNo  = date.qihao;
				stop      = date.fengdan;
				actionTime= date.kjsj;
				nowTime   = date.dates;

			}
			if(downCount>570){
				$('#kjqihao').html('<p id="kjqihao">第'+actionNo+'期<span style="color:red;font-size:22px;" class="touzhuinfo">抢庄</span>中</p>');
				if($('#shangzhuang').attr('disabled')) {
                	$('#shangzhuang').prop('disabled',false);
               }
                if(downCount - 570 < 10) {
                    layer.tips(downCount-570, '#shangzhuang', {
                    tips: [3, 'rgba(0,0,0,0.3)'], //还可配置颜色
                    time:600,
                });
                }

			}else if(stop >= downCount ){
				$('#kjqihao').html('<p id="kjqihao">第'+actionNo+'期<span style="color:red;font-size:22px;" class="touzhuinfo">封单</span>中</p>');
				if(!$('#shangzhuang').attr('disabled')) {
                $('#shangzhuang').attr('disabled','disabled');
               }
               
               if(downCount <= 10) {
                 layer.tips(downCount, '.touzhuinfo', {
                    tips: [3, 'rgba(0,0,0,0.3)'], //还可配置颜色
                    time:600,   
                });
               } 
			}else{
				if(downCount - 569 == 1){
	               	getBoss();
	               }
				$('#kjqihao').html('<p id="kjqihao">第'+actionNo+'期<span style="color:red;font-size:22px;" class="touzhuinfo">投注</span>中</p>');
				if(!$('#shangzhuang').attr('disabled')) {
                $('#shangzhuang').attr('disabled','disabled');
               }

			}
			// console.log(actionTime - nowTime);

			Minutes = parseInt(downCount / 60);
			second  = downCount % 60;
			if(Minutes < 10){
				$('.minutes').text('0'+Minutes);
			}else{
				$('.minutes').text(Minutes);
			}
			if(second < 10){
				$('.seconds').text('0'+second);
			}else{
				$('.seconds').text(second);
			}
			
			downCount = downCount-1;

		}

$(document).ready(function(){
// {qihao: "20180816018", kjsj: 1534392000, dates: 1534391802, fengdan: "90"}
	// 获取期号 开奖时间 当前服务器时间 庄家抢庄时间 封盘时间 
	// 开奖时间-当前服务器时间 =倒计时读秒
	// 倒计时读秒<=庄家抢庄时间限制秒=庄家抢庄时间
	// 倒计时读秒>=倒计时读秒-封盘时间=封盘时间
		setInterval("downCountS()",1000);
});