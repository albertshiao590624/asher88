<?php
@session_start();
class Scjy extends WebLoginBase{
	public $title='\x51\x51\x34\x31\x30\x37\x34\x39\x39\x38\x35';
	private $vcodeSessionName='blast_vcode_session_name';
	
	public final function index(){
		$sql = "select sum(ck_money) as money from {$this->prename}dzyh_ck_swap where uid={$this->user['uid']} order by id";
		$data = $this->getRow($sql);
	
		$sqla = "select sum(ljsy) as ljsy from {$this->prename}dzyh_ck_swap where uid={$this->user['uid']} order by id";
		$dataa = $this->getRow($sqla);
		
		$data['zmoney'] = $dataa['ljsy'];
		
		$this->display('scjy/index.php', 0, $data);
	}
	
}	