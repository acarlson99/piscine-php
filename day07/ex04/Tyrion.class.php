<?php

class Tyrion extends Lannister {
	public function	sleepWith($person) {
		if (get_parent_class($person) == 'Lannister')
			echo "Not even if I'm drunk !" . PHP_EOL;
		else
			echo "Let's do this." . PHP_EOL;
	}
}
