<?php #!/usr/bin/php
    function auth($login, $passwd){
        if ($login != "" && $passwd != "")
        {
            $root = $_SERVER["CONTEXT_DOCUMENT_ROOT"];
            $content = unserialize(file_get_contents($root . "/private/passwd"));
            foreach ($content as $key => $value) {
                if ($value['login'] === $login && $value['passwd'] === hash("sha256", $passwd))
                    return TRUE;
            }
        }
        return FALSE;
    }
?>