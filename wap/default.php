<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<script type="text/javascript">
/* 全屏启动方法 */
function fullScreen(el) {  
     var rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullScreen,  
         wscript;  
    
     if(typeof rfs != "undefined" && rfs) {  
         rfs.call(el);  
         return;  
     }  
    
     if(typeof window.ActiveXObject != "undefined") {  
         wscript = new ActiveXObject("WScript.Shell");  
         if(wscript) {  
             wscript.SendKeys("{F11}");  
         }  
     }  
  }  
   

// 退出全屏功能
  function exitFullScreen(el) {  
     var el= document,  
         cfs = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el.exitFullScreen,  
         wscript;  
    
     if (typeof cfs != "undefined" && cfs) {  
       cfs.call(el);  
       return;  
     }  
    
     if (typeof window.ActiveXObject != "undefined") {  
         wscript = new ActiveXObject("WScript.Shell");  
         if (wscript != null) {  
             wscript.SendKeys("{F11}");    
         }  
   }  
  }  
</script>
</head>

<body  style="margin:0px;padding:0px;overflow:hidden">
 <div align="right"><span style="color:red;">按Esc退出全屏</span></div>
  <div align="left"><input  id="btn"  type="button"  class="btn"  style="border:none;"  value="切换全屏" /> </div>
 
 <div id="map" class="right-m headDiv" >
  <div id="allmap"></div>
  
  <script type="text/javascript">
  window.οnlοad=function(){
  var btn = document.getElementById('btn');  
         var content = document.getElementById('allmap');  
         btn.onclick = function(){  
             fullScreen(content);  
         };
         var quite = document.getElementById('quite');  
         quite.onclick = function(){  
             exitFullScreen();  
         };
  };
 </script>

<iframe src="http://m.asher88.com" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>

</body>
</html>