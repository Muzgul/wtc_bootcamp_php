#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $url = $argv[1];
        $ch = curl_init($url);
        $fp = fopen("temp.txt", "w");
    
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    
        $content = file_get_contents("temp.txt");
        if (strlen($content) > 0)
        {
            $arr = preg_split("/</", $content);
            $imgs = [];
            foreach ($arr as $key => $value) {
                if (preg_match("/img.+src.+/", $value))
                {
                    $temp = preg_split("/src=/", trim($value));
                    $temp = preg_split("/\"/", trim($temp[1]));
                    if (strlen($temp[1]) > 0)
                        array_push($imgs, $temp[1]);
                }
            }
            if (count($imgs) > 0)
            {
                $temp = preg_split("/\//", $url);
                if ($temp[0][0] == 'h')
                    $dir = $temp[2] . "/";
                else
                    $dir = $temp[0] . "/";
                if (!preg_match("/www\..+/", $dir))
                    $dir = "www." . $dir;
                mkdir($dir);
                foreach ($imgs as $key => $value) {
                    if ($value[0] == '/')
                        $value = $url . $value;
                    $temp = preg_split("/\//", $value);
                    $name = $temp[count($temp) - 1];
                    $ch = curl_init($value);
                    $fp = fopen($dir . $name, 'wb');
                    curl_setopt($ch, CURLOPT_FILE, $fp);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_exec($ch);
                    curl_close($ch);
                    fclose($fp);
                }
            }
            else
                echo "No images on site!\n";
        }
        else
            echo "Can't connect to url: " . $argv[1] . "\n";
        unlink("temp.txt");
    } 
?>