#!/usr/bin/php
<?php
    $regexf = "/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([1-3][0-9]|[1-9]|0[1-9]) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) (19[7-9][0-9]|200[0-9]|201[0-8]) ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])/s";
    $regexe = "/(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday) ([1-3][0-9]|[1-9]|0[1-9]) (January|February|March|April|May|June|July|August|September|October|November|December) (19[7-9][0-9]|200[0-9]|201[0-8]) ([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])/s";
    $marrf = array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");
    $marre = array("January","February","March","April","May","June","July","August","September","October","November","December");
    $darrf = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
    $darre = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    if ($argc > 1)
    {
        date_default_timezone_set("Europe/Paris");
        $rese = preg_match($regexe, $argv[1]);
        $resf = preg_match($regexf, $argv[1]);
        if ($rese == 1 || $resf == 1)
        {
            if ($resf == 1)
            {
                $arr = explode(' ', $argv[1]);
                foreach ($darrf as $key => $value) {
                    if (strcmp($arr[0], $value) == 0)
                        $arr[0] = $darre[$key];
                }
                foreach ($marrf as $key => $value) {
                    if (strcmp($arr[2], $value) == 0)
                        $arr[2] = $marre[$key];
                }
                $str = $arr[0] . " " . $arr[1] . " " . $arr[2] . " " . $arr[3] . " " . $arr[4];
            }
            else
                $str = $argv[1];
            if ((strtotime($str)) === false) {
                echo "Wrong format!\n";
            }
            else
                echo strtotime($str);
        }
        else
            echo "Wrong format!\n";
    }
?>