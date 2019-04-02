<?php

class Color {
	static $verbose = 0;

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
		if (COLOR::$verbose)
			print("$this constructed.\n");
	}

	function	__destruct() {
		if (COLOR::$verbose)
			print("$this constructed.\n");
	}

	function	__toString() {
		return ("Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green,3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT).")");
	}

}

$color = new Color(array('rgb' => "0000483645"));

print("$color\n");

?>
