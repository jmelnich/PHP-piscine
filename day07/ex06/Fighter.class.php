<?php
class Fighter {
	private $_name;

	public function getType() {
		return $this->_name;
	}
	public function __construct($fighter) {
		$this->_name = $fighter;
	}
}
?>