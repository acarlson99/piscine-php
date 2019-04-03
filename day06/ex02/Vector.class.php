<?php

ini_set('display_errors', 'On');

require_once("../ex01/Vertex.class.php");

class	Vector {

	static $verbose = false;

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0;

	static function	doc() {
		return (file_get_contents("Vector.doc.txt"));
	}

	function	__construct(array $kwargs) {
		$this->_dest = clone $kwargs['dest'];
		if (array_key_exists('orig', $kwargs))
			$kwargs['orig'] = clone $kwargs['orig'];
		else
			$kwargs['orig'] = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
		$this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
		$this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
		$this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
		$this->_w = $kwargs['dest']->getW() - $kwargs['orig']->getW();
		if (Vector::$verbose)
			echo "$this constructed\n";
	}

	function	__destruct() {
		if (Vector::$verbose)
			echo "$this destructed\n";
	}

	function	__toString() {
		return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
		// return ("Vector( x:" . number_format($this->_x, 2) . ", y:" . number_format($this->_y, 2) . ", z:" . number_format($this->_z, 2) . ", w:" . number_format($this->_w, 2) . " )");
	}

	function	magnitude() {
		return (sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2));
	}

	function	normalize() {
		$m = $this->magnitude();
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x / $m, 'y' => $this->_y / $m, 'z' => $this->_z / $m)))));
	}

	function	add(Vector $rhs) {
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->getX(), 'y' => $this->_y + $rhs->getY(), 'z' => $this->_z + $rhs->getZ())))));
	}

	function	sub(Vector $rhs) {
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->getX(), 'y' => $this->_y - $rhs->getY(), 'z' => $this->_z - $rhs->getZ())))));
	}

	function	opposite() {
		return (new Vector(array('dest' => new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z)))));
	}

	function	scalarProduct($k) {
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k)))));
	}

	function	dotProduct(Vector $rhs) {
		return ($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->_z);
	}

	function	cos(Vector $rhs) {
		return ($this->dotProduct($rhs) / (abs($this->magnitude() * $rhs->magnitude())));
	}

	function	crossProduct(Vector $rhs) {
		return (new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(), 'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(), 'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX())))));
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

	/*

	  MAGNITUDE:
	  |a| = sqrt(a1^2 + a2^2 + a3^2);

	*/
}
