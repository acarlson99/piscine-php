<?php

class	Vector {

	static $verbose = false;

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;

	static function	doc() {
		return (file_get_contents("Vector.doc.txt"));
	}

	function	__construct(array $kwargs) {
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (Vertex::$verbose)
			echo "$this constructed\n";
	}

	function	__destruct() {
		if (Vertex::$verbose)
			echo "$this destructed\n";
	}

	function	__toString() {
		return ("Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . " )");
	}

	function	getX() {
		return ($this->_x);
	}

	function	getY() {
		return ($this->_y);
	}

	function	getZ() {
		return ($this->_z);
	}

	function	getW() {
		return ($this->_w);
	}

	function	getColor() {
		return ($this->_color);
	}

}
