<?php
/*
 * 自定义redis 处理session驱动
 * */
class SessionRedis{
	private $redis;
	public function execute(){
		session_set_save_handler(
		array(&$this,'open'),
		array(&$this,'close'),
		array(&$this,'read'),
		array(&$this,'write'),
		array(&$this,'destory'),
		array(&$this,'gc')
		);
	}
	public function open($path,$name){
// 		import('ORG.Util.Session);
		$this->redis=new Redis();
		return $this->redis->connect('127.0.0.1','6379');
	}
	public function  close(){
		
	}
	public function  read($id){
	
	}
	public function  write($id,$data){
	
	}
	public function  destory($id){
	
	}
	public function  gc($maxLifeTime){
	
	}
}  
?>