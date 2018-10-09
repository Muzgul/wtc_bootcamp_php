<?php
	class Color
	{
		// properties

			private			$red		= 0;
			private			$green		= 0;
			private			$blue		= 0;
			
			//static

			public static	$verbose = False;


		// methods
			// constructor

			public function    __construct($rgb){
				if (count($rgb) == 1){
					$this->red = ((int)$rgb['rgb'] >> 16) & 0xff;
					$this->green = ((int)$rgb['rgb'] >> 8) & 0xff;
					$this->blue = (int)$rgb['rgb'] & 0xff;
				}
				if (count($rgb) == 3){
					$this->red = (int)$rgb['red'];
					$this->green = (int)$rgb['green'];
					$this->blue = (int)$rgb['blue'];
				}
				if ($this->verbose == True)
					$temp = "TRUE";
				else
					$temp = "FALSE";
				echo "Verbose: " . $temp . PHP_EOL;
				if ($this->verbose)
					print( "Color( red: " . $this->red . ", green:   " . $this->green . ", blue:   " . $this->blue . " ) constructed." . PHP_EOL);
			}

			public function		__destruct(){
				if ($this->verbose)
					echo "Color( red:  $this->red, green:  $this->green, blue:  $this->blue ) destructed.";
			}

			// methods

			public function __toString(){
				return "Color( red:  $this->red, green:  $this->green, blue:  $this->blue )";
			}

			public static function doc(){
				return file_get_contents("Color.doc.txt");
			}

			public function add(Color $input){
				$rgb[0] = $this->$red + $input->$red;
				$rgb[1] = $this->$green + $input->$green;
				$rgb[2] = $this->$blue + $input->$blue;
				return new Color($rgb);
			}

			public function sub(Color $input){
				$rgb[0] = $input->$red - $this->$red;
				$rgb[1] = $input->$green - $this->$green;
				$rgb[2] = $input->$blue - $this->$blue;
				return new Color($rgb);
			}

			public function mult($factor){
				$rgb[0] = $this->$red * $factor;
				$rgb[1] = $this->$green * $factor;
				$rgb[2] = $this->$blue * $factor;
				return new Color($rgb);
			}
	}
	
?>