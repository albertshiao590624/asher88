<?php
error_reporting(0);
isset($_COOKIE['nc'])?$nc = $_COOKIE['nc']:$nc = null;
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="/newskin/liaotian/index.css" rel="stylesheet" />
<script src="/newskin/liaotian/jquery-1.11.1.min.js"></script>
<script src="/newskin/liaotian/index.js"></script>
</head>
<body>
<title>線上聊天室</title>
<div id="title">阿舍仔娛樂城多人聊天室</div>
<div id="chat">
<div class="window"></div>
<div class="bottom"><marquee><?=$this->settings['webGG']?></marquee></div>
</div>
<div id="shuru"><textarea style="width: 100%;height:50px;resize:none;" id="content"></textarea></div>
<div id="form"><input type="submit" value="發送" id="send" class="send" /><input type="hidden" id="nicheng" class="nicheng" value="<?php echo $nc;?>" /></div>
<div id="form"><input type="button" class="fanhui" value="重設暱稱" id="reset"  /></div>
<!--div id="bottom">&copy; 版權所有  <a href="/" target="_blank">訪問官網</a></div-->
<div id="bg"></div>
<div id="window">
<div class="t">
<div class="title">設置我的暱稱</div>
<div class="nc">

<input type="text" value="<?php echo $nc;?>" id="nc" maxlength="5" style="width: 60%;height:30px;text-align:center;" /><br /><br />
<input type="button" id="setting" value="設置" style="width: 60%;height:30px;" />

</div>
</div>
</div>

</body>
