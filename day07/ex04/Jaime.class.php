<?php

class Jaime extends Lannister {
	public function	sleepWith($person) {
		if (get_class($person) == 'Cersei')
			echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
		else if (get_parent_class($person) == 'Lannister')
			echo "Not even if I'm drunk !" . PHP_EOL;
		else
			echo "Let's do this." . PHP_EOL;
	}
}
