<?php

class Sessions{
	
	private $timeout,
			$session_expire_name = 'session_expire';
	
	public function __construct($session_expire_name = 'session_expire'){
		session_start();
		$this->session_expire_name = $session_expire_name;
		$_SESSION['initial_start'] ? null:$_SESSION['initial_start'] = mktime();
		$this->sarr = $_SESSION;
		return;
	}
	
	public function setData($key, $val){
		$_SESSION[$key] = $val;
		$this->sarr = $_SESSION;
		return;
	}
	
	public function check(){
		if($this->sarr[$this->session_expire_name] && $this->sarr[$this->session_expire_name] >= mktime()){
			return true;
		}else if($_SESSION[$this->session_expire_name] && $this->sarr[$this->session_expire_name] < mktime()){
			$this->setData('initial_start', false);
			return false;
		}else{
			return false;
		}
	}
	
	public function update($expire = 30){
		$this->timeout = $expire;
		$this->setData($this->session_expire_name, mktime() + 60 * $this->timeout);
		return;
	}
	
	public function unsetData($key){
		$_SESSION[$key] = false;
		$this->sarr = $_SESSION;
		return true;
	}
	
	public function doShow(){
		echo "<pre>";
		echo "initial start..." . date('d M Y g:i', $this->sarr['initial_start']);
		echo "\n\n";
		print_r($_SESSION);
		echo "</pre>";
	}
}