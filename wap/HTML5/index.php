﻿

<!DOCTYPE html>
<html manifest="offline.appcache">
<head>
    <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <script>
document.addEventListener("keydown", function(e) {
  if (e.keyCode == 13) {
    toggleFullScreen();
  }
}, false);
function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
    </script>
	<title>阿舍仔-Slot</title>
	
	<!-- Standardised web app manifest -->
	<link rel="manifest" href="appmanifest.json" />
	
	<!-- Allow fullscreen mode on iOS devices. (These are Apple specific meta tags.) -->
	<meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>

  <!--https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html-->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="format-detection" content="telephone=no">

  <!-- force webkit on 360 -->
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <!-- force edge on IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="msapplication-tap-highlight" content="no">

  <!-- force full screen on some browser -->
  <meta name="full-screen" content="yes"/>
  <meta name="x5-fullscreen" content="true"/>
  <meta name="360-fullscreen" content="true"/>
  
  <!-- force screen orientation on some browser -->
  <meta name="screen-orientation" content="landscape"/>
  <meta name="x5-orientation" content="landscape">

  <!--fix fireball/issues/3568 -->
  <!--<meta name="browsermode" content="application">-->
  <meta name="x5-page-mode" content="app">
	<link rel="shortcut icon" sizes="256x256" href="icon-256.png" />
 <link rel="stylesheet" type="text/css" href="style-mobile.css"/>
    <!-- All margins and padding must be zero for the canvas to fill the screen. -->
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}
		html, body {
			background: #000;
			color: #fff;
			overflow: hidden;
			touch-action: none;
			-ms-touch-action: none;
		}
		canvas {
			touch-action-delay: none;
			touch-action: none;
			-ms-touch-action: none;
		}
    </style>
	



</head> 
 <script type="text/javascript"> 
function max()
{
  var obj = new ActiveXObject("Wscript.shell");
  obj.SendKeys("{f11}");
}
</script>
<body onLoad="MM_callJS(' max()')"> 
<div id="fb-root"></div>
	
	<script>
	// Issue a warning if trying to preview an exported project on disk.
	(function(){
		// Check for running exported on file protocol
		if (window.location.protocol.substr(0, 4) === "file")
		{
			alert("Exported games won't work until you upload them. (When running on the file:/// protocol, browsers block many features from working for security reasons.)");
		}
	})();
	</script>
    
    
	
	<!-- The canvas must be inside a div called c2canvasdiv -->
	<div id="c2canvasdiv">
	
		<!-- The canvas the project will render to.  If you change its ID, don't forget to change the
		ID the runtime looks for in the jQuery events above (ready() and cr_sizeCanvas()). -->
		<canvas id="c2canvas" width="1280" height="720">
			<!-- This text is displayed if the visitor's browser does not support HTML5.
			You can change it, but it is a good idea to link to a description of a browser
			and provide some links to download some popular HTML5-compatible browsers. -->
			
		</canvas>
		
	</div>
    
    <div class="home_b">
			<div class="m_nav_line"></div>
				<!-- <a href="">首页</a> -->
				<a class="one_nav_list conpt_icon" href="/?v=2">电脑版</a>
				<a class="one_nav_list retreat_icon" href="javascript:m_loginout()">安全退出</a>
		</div>
	
	<!-- Pages load faster with scripts at the bottom -->
	
	<!-- Construct 2 exported games require jQuery. -->
	<script src="jquery-2.1.1.min.js"></script>


	
    <!-- The runtime script.  You can rename it, but don't forget to rename the reference here as well.
    This file will have been minified and obfuscated if you enabled "Minify script" during export. -->
	<script src="c2runtime.js"></script>

    <script>
		// Start the Construct 2 project running on window load.
		jQuery(document).ready(function ()
		{			
			// Create new runtime using the c2canvas
			cr_createRuntime("c2canvas");
		});
		
		// Pause and resume on page becoming visible/invisible
		function onVisibilityChanged() {
			if (document.hidden || document.mozHidden || document.webkitHidden || document.msHidden)
				cr_setSuspended(true);
			else
				cr_setSuspended(false);
		};
		
		document.addEventListener("visibilitychange", onVisibilityChanged, false);
		document.addEventListener("mozvisibilitychange", onVisibilityChanged, false);
		document.addEventListener("webkitvisibilitychange", onVisibilityChanged, false);
		document.addEventListener("msvisibilitychange", onVisibilityChanged, false);
		
		if (navigator.serviceWorker && navigator.serviceWorker.register)
		{
			// Register an empty service worker to trigger web app install banners.
			navigator.serviceWorker.register("sw.js", { scope: "./" });
		}
    </script>
</body> 
</html> 