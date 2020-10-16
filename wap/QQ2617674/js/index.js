

function login(){
	var data = $('form').serializeArray();

	console.log(data);
	$.ajax({
		url:'/user/loginedto',
		type:'post',
		data:{'username':data[0].value,'password':data[1].value,'vcode':data[2].value},
		success:function(data){
			var jsArr = JSON.parse(data);
			if(jsArr.err == 'false'){
				layer.msg(jsArr.msg,{offset: '300px'});
			}else{
				location='/';
			}
			
			
		},
		error:function(err){
			console.log(err);
		}

	})

}
function reCode(){
  $('.menu1').hide();
  setTimeout(function (params) {
    $('.menu1').show();
        },100);
  layer.alert('刷新成功');

}
function getCoin(){
  var coin = $('.coin').text();
  $('.coin').text('正在刷新...');
  $.ajax({
    url:"/lives/getCoin",
    type:'post',
    dataType:'json',
    success:function(data){

  $('.coin').text(data);
    },
    error:function(){
       // alert('a');
     $('.coin').text(coin);
  }
})
}


function logout() {
            var domain = window.location.host
            if(confirm("確定退出系統嗎？")){
                        $.get("/api/logout.do",
                function(a) {
                    window.location.href = 'http://'+domain;
                })
            }   
        }

   function aa(){
            layer.msg('請先登錄',{offset: '300px'});
   }


   function bb(){
            layer.msg('已經登錄',{offset: '300px'});
   }

         function next(url){
                    var domain = window.location.host

                   $.ajax({
                    url:'/index/userinline',
                    type:'post',
                    dataType:"json",
                    success:function(data){
                        if(data == '0'){
                            layer.msg('請先登錄',{offset: '300px'});
                        }else{
                            
                            window.location.href="http://"+domain+url; 
                        }

                    },
                    error:function(data){
                        layer.msg('error'+data,{offset: '100px'});
                        console.log('error'+data);
                    }

            })
        }



function info(id){
    // layer.alert({'內容',});
    layer.open({
      type: 2,
      title: '帳號中心',
      shadeClose: true,
      offset: '100px',
      shade: false,
      maxmin: true, //開啟最大化最小化按鈕
      area: ['900px', '600px'],
      content: '/Lives/moeny?id='+id
    });
}    

// 註冊頁面
function toRegister(){
   layer.open({
      type: 2,
      title: '帳號註冊',
      shadeClose: true,
      offset: '100px',
      shade: false,
      maxmin: true, //開啟最大化最小化按鈕
      area: ['600px', '600px'],
      content: '/Lives/toRegister'
    });

}

function getOrder(){
   layer.open({
      type: 2,
      title: '帳號中心',
      shadeClose: true,
      offset: '100px',
      shade: false,
      maxmin: true, //開啟最大化最小化按鈕
      area: ['1100px', '700px'],
      content: '/Lives/getBBOrder'
    });
}


function getBet(){
   layer.open({
      type: 2,
      title: '下注記錄',
      shadeClose: true,
      offset: '100px',
      shade: false,
      maxmin: true, //開啟最大化最小化按鈕
      area: ['1100px', '700px'],
      content: '/Lives/getBetList'
    });
}

function test(){
   layer.msg('請註冊正式帳號後再進行操作',{offset: '300px'});
}

function iframe(url,title){
   layer.open({
      type: 2,
      title: title,
      shadeClose: true,
      offset: '100px',
      shade: false,
      maxmin: true, //開啟最大化最小化按鈕
      area: ['1100', '700px'],
      content: url
    });
}
function addFavorite2() {
var url = window.location;
var title = document.title;
var ua = navigator.userAgent.toLowerCase();
if (ua.indexOf("360se") > -1) {
alert("由於360流覽器功能限制，請按 Ctrl+D 手動收藏！");
}
else if (ua.indexOf("msie 8") > -1) {
window.external.AddToFavoritesBar(url, title); //IE8
}
else if (document.all) {
try{
window.external.addFavorite(url, title);
}catch(e){
alert('您的流覽器不支持,請按 Ctrl+D 手動收藏!');
}
}
else if (window.sidebar) {
window.sidebar.addPanel(title, url, "");
}
else {
alert('您的流覽器不支持,請按 Ctrl+D 手動收藏!');
}
}

$(function(){

  $("#paizhao").hover(function (){ 
            $('#pzs').show();
        },function (){  
            $('#pzs').hide();
        });  


})

