<?php
@session_start();
class Zryl extends WebLoginBase{
	public $title='\x51\x51\x34\x31\x30\x37\x34\x39\x39\x38\x35';
	private $vcodeSessionName='blast_vcode_session_name';
	/**
	 * 用户信息页面
	 */
	public final function index(){
		$this->display('zryl/index.php');
	}
	
}