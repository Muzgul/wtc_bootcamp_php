#!/usr/bin/php
<?php
    if ($argc == 3)
    {
        $temp = preg_split("/\./", $argv[1]);
        if (strcmp($temp[1], "csv") == 0)
        {
            $temp = file_get_contents("$temp[0].$temp[1]");
            $lines = preg_split("/\n/", $temp);
            $headers = preg_split("/,/", $lines[0]);
            $pos = -1;
            foreach ($headers as $key => $value) {
                if (strcmp($value, $argv[2]) == 0)
                    $pos = $key;
                ${$value} = [];
            }
            if ($pos != -1)
            {
                foreach ($lines as $key => $value) {
                    if ($key > 0)
                    {
                        $line = preg_split("/,/", $value);
                        foreach ($line as $key => $value) {
                            ${$headers[$key]}[$line[$pos]] = "$value";
                        }
                    }
                }
                do{
                    echo "Enter your command: ";
                    $input = fgets(STDIN);
                    if (strlen(trim($input)) > 0)
                    {
                        try{
                            eval($input);
                        }catch (Throwable $error)
                        {
                            $error = preg_split("/\n/", $error);
                            echo $error[0] . "\n";
                        }                         
                    }
                }while (strlen($input) != 0);
            }
        }
    }
?>