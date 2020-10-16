<?php
require 'xingcai_lib/core/DBAccess.class';
require 'xingcai_lib/core/Object.class';
require 'xingcai_back/WebBase.class.php';
require 'xingcai_back/WebLoginBase.class.php';

require 'xingcai_config.php';

$para=array();

if(isset($_SERVER['PATH_INFO'])){
	$para=explode('/', substr($_SERVER['PATH_INFO'],1));
	if($control=array_shift($para)){
		if(count($para)){
			$action=array_shift($para);
		}else{
			$action=$control;
			$control='index';
		}
	}else{
		$control='index';
		$action='main';
	}
}else{
	$control='index';
	$action='main';
}
$control=ucfirst($control);

if(strpos($action,'-')!==false){
	list($action, $page)=explode('-',$action);
}

$file=$conf['action']['modals'].$control.'.class.php';
if(!is_file($file)) notfound('找不到控制器');
try{
	require $file;
}catch(Exception $e){
	print_r($e);
	exit;
}

if(!class_exists($control)) notfound('找不到控制器1');
$jms=new $control($conf['db']['dsn'], $conf['db']['user'], $conf['db']['password']);
$jms->debugLevel=$conf['debug']['level'];

if(!method_exists($jms, $action)) notfound('方法不存在');
$reflection=new ReflectionMethod($jms, $action);
if($reflection->isStatic()) notfound('不允許調用Static修飾的方法');
if(!$reflection->isFinal()) notfound('只能調用final修飾的方法');

$jms->controller=$control;
$jms->action=$action;

$jms->charset=$conf['db']['charset'];
$jms->cacheDir=$conf['cache']['dir'];
$jms->setCacheDir($conf['cache']['dir']);
$jms->actionTemplate=$conf['action']['template'];
$jms->prename=$conf['db']['prename'];
$jms->title=$conf['web']['title'];
if(method_exists($jms, 'getSystemSettings')) $jms->getSystemSettings();

if($jms->settings['switchWeb']=='0'){
	$jms->display('close-service.php');
	exit;
}

if(isset($page)) $jms->page=$page;

if($q=$_SERVER['QUERY_STRING']){
	$para=array_merge($para, explode('/', $q));
}
if($para==null) $para=array();

$jms->headers=getallheaders();
if(isset($jms->headers['x-call'])){
	// 函式呼叫
	header('content-Type: application/json');
	try{
		ob_start();
		echo json_encode($reflection->invokeArgs($jms, $_POST));
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(isset($jms->headers['x-form-call'])){

	// 表單調用
	$accept=strpos($jms->headers['Accept'], 'application/json')===0;
	if($accept) header('content-Type: application/json');
	try{
		ob_start();
		if($accept){
			echo json_encode($reflection->invokeArgs($jms, $_POST));
		}else{
			json_encode($reflection->invokeArgs($jms, $_POST));
		}
		ob_flush();
	}catch(Exception $e){
		$jms->error($e->getMessage(), true);
	}
}elseif(strpos($jms->headers['Accept'], 'application/json')===0){
	// AJAX調用
	header('content-Type: application/json');
	try{
		echo json_encode(call_user_func_array(array($jms, $action), $para));
	}catch(Exception $e){
		$jms->error($e->getmessage());
	}
}else{
	// 普通請求
	header('content-Type: text/html;charset=utf-8');
	call_user_func_array(array($jms, $action), $para);
}
$jms=null;

function notfound($message){
	header('content-Type: text/plain; charset=utf8');
	header('HTTP/1.1 404 Not Found');
	die($message);
}