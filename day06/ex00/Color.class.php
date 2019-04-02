<?php

class Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	function	__construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			$this->red = (intval($kwargs['rgb']) & 0xff0000) >> 16;
			$this->green = (intval($kwargs['rgb']) & 0x00ff00) >> 8;
			$this->blue = (intval($kwargs['rgb']) & 0x0000ff);
		}
		else {
			if (array_key_exists('red', $kwargs)) {
				$this->red = intval($kwargs['red']);
			}
			if (array_key_exists('green', $kwargs)) {
				$this->green = intval($kwargs['green']);
			}
			if (array_key_exists('blue', $kwargs)) {
				$this->blue = intval($kwargs['blue']);
			}
		}
	}

	function	__destruct() {

	}

	function	__toString() {
		return ($this->red . " " . $this->green . " " . $this->blue);
	}

}

$color = new Color(array('rgb' => "2147483645"));

print("$color");

?>
