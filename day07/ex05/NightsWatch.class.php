<?php

class NightsWatch {
	private $boys = array();

	function	recruit($boy) {
		if (in_array('IFighter', class_implements($boy)))
			$this->boys[] = clone $boy;
	}

	function	fight() {
		foreach ($this->boys as $lad) {
			$lad->fight();
		}
	}
}
