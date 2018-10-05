<?php #!/usr/bin/php
    $message = "OK";
    if ($_POST['submit'] == "OK")
    {
        $match = 0;
        $usr = array("login"=>$_POST['login'], "passwd"=>hash("sha256", $_POST['passwd']));
        if (file_exists("/private/passwd"))
        {
            $arr = unserialize(file_get_contents("/private/passwd"));
            foreach ($arr as $key => $value) {
                if ($value['login'] == $usr['login'])
                    $match = 1;
            }
            if ($match == 0)
                array_push($arr, $usr);
            else
                $message = "ERROR\n";
        }
        else
        {
            $arr = array($usr);
            if (!(file_exists("/private")))
                mkdir("/private");
        }
        if ($match == 0)
            file_put_contents("/private/passwd", serialize($arr));
    }
    else
        $message = "ERROR\n";
    echo $message;
?>