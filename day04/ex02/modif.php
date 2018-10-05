<?php #!/usr/bin/php
    $message = "OK";
    if ($_POST['submit'] == "OK")
    {
        $match = 0;
        $oldpw = hash("sha256", $_POST['oldpw']);
        $newpw = hash("sha256", $_POST['newpw']);
        if (file_exists("/private/passwd") && $oldpw != $newpw)
        {
            $arr = unserialize(file_get_contents("/private/passwd"));
            foreach ($arr as $key => $value) {
                if ($value['login'] == $usr['login'] && $value['passwd'] == $oldpw)
                {
                    $match = 1;
                    $arr[$key]['passwd'] = $newpw;
                }
            }
            if ($match == 1)
                file_put_contents("/private/passwd", serialize($arr));
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