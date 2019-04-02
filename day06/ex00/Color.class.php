<?php

ini_set('display_errors', "1");

class Color {
	static $verbose = false;

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
				if ($this->red > 255)
					$this->red = 255;
				else if ($this->red < 0)
					$this->red = 0;
			}
			if (array_key_exists('green', $kwargs)) {
				$this->green = intval($kwargs['green']);
				if ($this->green > 255)
					$this->green = 255;
				else if ($this->green < 0)
					$this->green = 0;
			}
			if (array_key_exists('blue', $kwargs)) {
				$this->blue = intval($kwargs['blue']);
				if ($this->blue > 255)
					$this->blue = 255;
				else if ($this->blue < 0)
					$this->blue = 0;
			}
		}
		if (COLOR::$verbose)
			print("$this constructed.\n");
	}

	function	__destruct() {
		if (COLOR::$verbose)
			print("$this destructed.\n");
	}

	function	__toString() {
		return ("Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green,3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT)." )");
	}

	function	add(Color $rhs) {
		return (new Color(array("red" => $this->red + $rhs->red, "green" => $this->green + $rhs->green, "blue" => $this->blue + $rhs->blue)));
	}

	function	sub(Color $rhs) {
		return (new Color(array("red" => $this->red - $rhs->red, "green" => $this->green - $rhs->green, "blue" => $this->blue - $rhs->blue)));
	}

	function	mult($f) {
		return (new Color(array("red" => $this->red * $f, "green" => $this->green * $f, "blue" => $this->blue * $f)));
	}

	static function	doc() {
		return (file_get_contents("Color.doc.txt"));
	}

}
