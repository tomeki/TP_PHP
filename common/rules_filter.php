<?php

class Rules_Filter{
	private $_ipSrc;
	private $_ipDest;
	private $_portSrc;
	private $_portDest;
	private $_state;
	private $_name;

	public function getIPSource() {
		return $this->_ipSrc;
	}
	public function getIPDest() {
		return $this->_ipDest;
	}
	public function getName() {
		return $this->_name;
	}
	public function getPortSource() {
		return $this->_portSrc;
	}
	public function getPortDest() {
		return $this->_portDest;
	}
	public function getState() {
		return $this->_state;
	}

	public function setIPSource($anIP) {
		$this->_ipSrc = $anIP;
	}
	public function setIPDest($anIP) {
		$this->_ipDest = $anIP;
	}
	public function setName($aName) {
		$this->_name = $aName;
	}
	public function setPortDest($aPort) {
		$this->_portDest = $aPort;
	}
	public function setPortSource($aPort) {
		$this->_portSrc = $aPort;
	}
	public function setState($aState) {
		$this->_state = $aState;
	}

}

?>
