<?php

require_once("../ex00/Color.class.php");

class Vertex {

	static $verbose = false;

	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1.0;
	private $_color;

	static function	doc() {
		return (file_get_contents("Vertex.doc.txt"));
	}

	function	__construct(array $kwargs) {
		if (array_key_exists('color', $kwargs))
			$this->_color = clone $kwargs['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
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
		if (Vertex::$verbose)
			return ("Vertex( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . ", " . $this->_color . " )");
		else
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
