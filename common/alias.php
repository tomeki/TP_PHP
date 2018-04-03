<?php

class Alias {
	private $_ip;
	private $_port;
	private $_name;

	public function getIP() {
		return $this->_ip;
	}
	public function getName() {
		return $this->_name;
	}
	public function getPort() {
		return $this->_port;
	}

	public function setIP($anIP) {
		$this->_ip = $anIP;
	}
	public function setName($aName) {
		$this->_name = $aName;
	}
	public function setPort($aPort) {
		$this->_port = $aPort;
	}

}

?>