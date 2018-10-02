<?php
    $regexf = "(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([1-3][0-9]|[0-9]) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) (19[7-9][0-9]|200[0-9]|201[0-8])";
    $regexe = "(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday) ([1-3][0-9]|[0-9]) (January|February|March|April|May|June|July|August|September|October|November|December) (19[7-9][0-9]|200[0-9]|201[0-8])";

    if ($argc > 1)
    {
        $res = preg_match($regexe, $argv[1]);
        echo $res;
    }
?>