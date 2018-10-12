<?php
# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Color.class.php                                    :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: mmacdona <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/10/10 11:41:52 by mmacdona          #+#    #+#              #
#    Updated: 2018/10/10 11:41:53 by mmacdona         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

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
				if (self::$verbose)
					print( "Color( red: " . str_pad($this->red, 3, " ", STR_PAD_LEFT) . ", green:   " . str_pad($this->green, 3, " ", STR_PAD_LEFT) . ", blue:   " . str_pad($this->blue, 3, " ", STR_PAD_LEFT) . " ) constructed." . PHP_EOL);
			}

			public function		__destruct(){
				if (self::$verbose)
					echo "Color( red:  " . str_pad($this->red, 3, " ", STR_PAD_LEFT) . ", green:  " . str_pad($this->green, 3, " ", STR_PAD_LEFT) . ", blue:  " . str_pad($this->blue, 3, " ", STR_PAD_LEFT) . " ) destructed." . PHP_EOL;
			}

			// methods

			//private

			private function normalize( Color $input ){
				if ($input->red > 255)
					$input->red = 255;
				if ($input->red < 0)
					$input->red = 0;
				if ($input->green > 255)
					$input->green = 255;
				if ($input->green < 0)
					$input->green = 0;
				if ($input->blue > 255)
					$input->blue = 255;
				if ($input->blue < 0)
					$input->blue = 0;
				return ( $input );
			}

			//public

			public function __toString(){
				return "Color( red:  " . str_pad($this->red, 3, " ", STR_PAD_LEFT) . ", green:  " . str_pad($this->green, 3, " ", STR_PAD_LEFT) . ", blue:  " . str_pad($this->blue, 3, " ", STR_PAD_LEFT) . " )";
			}

			public static function doc(){
				return file_get_contents("Color.doc.txt");
			}

			public function add(Color $input){
				$rgb['red'] = $this->red + $input->red;
				$rgb['green'] = $this->green + $input->green;
				$rgb['blue'] = $this->blue + $input->blue;
				return self::normalize( new Color($rgb) );
			}

			public function sub(Color $input){
				$rgb['red'] = $this->red - $input->red;
				$rgb['green'] = $this->green - $input->green;
				$rgb['blue'] = $this->blue - $input->blue;
				return self::normalize( new Color($rgb) );
			}

			public function mult($factor){
				$rgb['red'] = $this->red * $factor;
				$rgb['green'] = $this->green * $factor;
				$rgb['blue'] = $this->blue * $factor;
				return self::normalize( new Color($rgb) );
			}
	}
	
?>
