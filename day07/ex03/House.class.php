<?php

abstract class House {
	abstract protected function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();
	public function	introduce() {
		echo "House ", $this->getHouseName(), " of ", $this->getHouseSeat(), " : \"", $this->getHouseMotto(), "\"", PHP_EOL;
	}
}
