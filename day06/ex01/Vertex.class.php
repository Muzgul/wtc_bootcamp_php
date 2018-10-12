<?php
# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Vertex.class.php                                   :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: mmacdona <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/10/10 11:41:59 by mmacdona          #+#    #+#              #
#    Updated: 2018/10/10 11:42:00 by mmacdona         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

    require_once "Color.class.php";

    class Vertex
    {

        // properties
            private     $_x;
            private     $_y;
            private     $_z;
            private     $_w;
            private     $_color;

            public static $verbose = False;

        // methods

            public function __construct( $inputArr ){
                $this->_x = (double)$inputArr['x'];
                $this->_y = (double)$inputArr['y'];
                $this->_z = (double)$inputArr['z'];
                if (count($inputArr) > 3){
                    if (isset($inputArr['color']))
                        $this->_color = $inputArr['color'];
                    else
                        $this->_color = new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255) );
                    if (isset($inputArr['w']))
                        $this->_w = (double)$inputArr['w'];
                    else
                        $this->_w = 1.0;
                }
                if (count($inputArr) == 3){
                    $this->_color = new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255) );
                    $this->_w = 1.0;
                }
                if (self::$verbose)
                    print("Vertex ( x: " . number_format((float)$this->_x, 2, '.', '') . ", y: " . number_format((float)$this->_y, 2, '.', '') . ", z: " . number_format((float)$this->_z, 2, '.', '') . ", w: " . number_format((float)$this->_w, 2, '.', '') . ", " . $this->_color . " ) constructed." . PHP_EOL);
            }

            public function __destruct(){
                if (self::$verbose)
                    print( $this . " destructed." . PHP_EOL);
            }

            public function __toString(){
                $ret =  "Vertex ( x: " . number_format((float)$this->_x, 2, '.', '') . ", y: " . number_format((float)$this->_y, 2, '.', '') . ", z: " . number_format((float)$this->_z, 2, '.', '') . ", w: " . number_format((float)$this->_w, 2, '.', '');
                if (self::$verbose)
                    $ret .= ", " . $this->_color;
                else
                    $ret .= ")";
                return ( $ret );
            }

            public static function doc(){
                return file_get_contents("Vertex.doc.txt");
            }

    }
    

?>