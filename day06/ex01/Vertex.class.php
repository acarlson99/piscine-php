<?php

require_once("../ex00/Color.class.php");

class Vertex {

	static $verbose = false;

	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1.0;
	private $_color; // = new Color(array('red' => 0, 'green' => 0, 'blue' => 0));

	static function	doc() {
		return (file_get_contents("Vertex.doc.txt"));
	}

	function	__construct(array $kwargs) {
		if (array_key_exists('color', $kwargs))
			$this->color = clone $kwargs['color'];
		else
			$this->_color = NULL; // new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (array_key_exists('x', $kwargs))
			$this->_x = $kwargs['x'];
		if (array_key_exists('y', $kwargs))
			$this->_y = $kwargs['y'];
		if (array_key_exists('z', $kwargs))
			$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (Vertex::$verbose)
			echo "$this constructed\n";
		echo $this->_color . "\n";
	}

	function	__destruct() {
		if (Vertex::$verbose)
			echo "$this destructed\n";
	}

	function	__toString() {
		// return ("Vertex( $this->_x, $this->_y, $this->_z, $this->_w, $this->_color)");
		return ("Vertex( " . number_format($this->_x, 2) . ", " . number_format($this->_y, 2) . ", " . number_format($this->_z, 2) . ", " . number_format($this->_w, 2) . ", " . $this->_color . " )");
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
