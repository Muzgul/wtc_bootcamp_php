<?php #!/usr/bin/php
    $message = "OK";
    $root = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
    if ($_POST['submit'] == "OK" && $_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
    {
        $match = 0;
        $oldpw = hash("sha256", $_POST['oldpw']);
        $newpw = hash("sha256", $_POST['newpw']);
        if (file_exists($root . "/private/passwd") && $oldpw != $newpw)
        {
            $arr = unserialize(file_get_contents($root . "/private/passwd"));
            foreach ($arr as $key => $value) {
                if ($value['login'] == $usr['login'] && $value['passwd'] == $oldpw)
                {
                    $match = 1;
                    $arr[$key]['passwd'] = $newpw;
                }
            }
            if ($match == 1)
                file_put_contents($root . "/private/passwd", serialize($arr));
            else
                $message = "ERROR\n";
        }
        else
            $message = "ERROR\n";
    }
    else
        $message = "ERROR\n";
    echo $message;
?>