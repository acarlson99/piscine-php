<?php

class UnholyFactory {
	private $_lads = array();

	public function	absorb($lad) {
		if (get_parent_class($lad) !== 'Fighter')
			echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
		else if (array_key_exists($lad->getName(), $this->_lads))
			echo "(Factory already absorbed a fighter of type ".$lad->getName().")".PHP_EOL;
		else if (get_parent_class($lad) == 'Fighter') {
			$this->_lads[$lad->getName()] = clone $lad;
			echo "(Factory absorbed a fighter of type ".$lad->getName().")".PHP_EOL;
		}
	}

	public function	fabricate($lad) {
		if (array_key_exists($lad, $this->_lads)) {
			echo "(Factory fabricates a fighter of type ".$lad.")".PHP_EOL;
			return (clone $this->_lads[$lad]);
		}
		else {
			echo "(Factory hasn't absorbed any fighter of type ".$lad.")".PHP_EOL;
			return (NULL);
		}
	}
}
