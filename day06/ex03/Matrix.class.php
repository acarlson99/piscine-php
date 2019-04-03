<?php

ini_set('display_errors', 'On');

require_once("../ex02/Vector.class.php");

class	Matrix {

	static $verbose = false;

	private $_vects;

	function	__construct(array $kwargs) {
		$this->_vects[0] = $kwargs[0];
		$this->_vects[1] = $kwargs[1];
		$this->_vects[2] = $kwargs[2];
		$this->_vects[3] = $kwargs[3];
		if (Matrix::$verbose)
			echo "$this created\n";
	}

	function	__destruct() {
		if (Matrix::$verbose)
			echo "$this destroyed\n";
	}

	function	__toString() {
		return (sprintf("  vtcX vtcY vtcZ vtxO\nx %-.1f %-.1f %-.1f %-1.f\ny %-.1f %-.1f %-.1f %-1.f\nz %-.1f %-.1f %-.1f %-1.f\nw %-.1f %-.1f %-.1f %-1.f\n", $this->_vects[0]->getX(), $this->_vects[1]->getX(), $this->_vects[2]->getX(), $this->_vects[3]->getX(), $this->_vects[0]->getY(), $this->_vects[1]->getY(), $this->_vects[2]->getY(), $this->_vects[3]->getY(), $this->_vects[0]->getZ(), $this->_vects[1]->getZ(), $this->_vects[2]->getZ(), $this->_vects[3]->getZ(), $this->_vects[0]->getW(), $this->_vects[1]->getW(), $this->_vects[2]->getW(), $this->_vects[3]->getW()));
	}
}
