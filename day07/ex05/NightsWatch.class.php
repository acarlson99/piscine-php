<?php

class NightsWatch {
	private $_boys = array();

	function	recruit($boy) {
		if (in_array('IFighter', class_implements($boy)))
			$this->_boys[] = clone $boy;
	}

	function	fight() {
		foreach ($this->_boys as $lad) {
			$lad->fight();
		}
	}
}
