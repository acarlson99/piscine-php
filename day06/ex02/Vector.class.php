<?php

require_once("../ex01/Vertex.class.php");

class	Vector {

	static $verbose = false;

	private $_orig;
	private $_dest;

	static function	doc() {
		return (file_get_contents("Vector.doc.txt"));
	}

	function	__construct(array $kwargs) {
		$this->_dest = clone $kwargs['dest'];
		if (array_key_exists('orig', $kwargs))
			$this->_orig = clone $kwargs['orig'];
		else
			$this->_orig = new Vertex(array('x' => 0, 'y' => 0,
											'z' => 0, 'w' => 1));
		if (Vector::$verbose)
			echo "$this constructed\n";
	}

	function	__destruct() {
		if (Vector::$verbose)
			echo "$this destructed\n";
	}

	function	__toString() {
		return ("Vector( x: " . number_format($this->_x, 2) . ", y: " . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . " )");
	}

	function	magnitude() {

	}

	function	normalize() {

	}

	function	add(Vector $rhs) {

	}

	function	sub(Vector $rhs) {

	}

	function	opposite() {

	}

	function	scalarProduct($k) {

	}

	function	dotProduct(Vector $rhs) {

	}

	function	cos(Vector $rhs) {

	}

	function	crossProduct(Vector $rhs) {

	}

	/*

	  MAGNITUDE:
	  |a| = sqrt(a1^2 + a2^2 + a3^2);

	*/
}
