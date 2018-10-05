<?php #!/usr/bin/php
    function auth($login, $passwd){
        if ($login == "" || $login == NULL || $passwd == "" || $passwd == NULL)
            return FALSE;
        $content = unserialize(file_get_contents("/private/passwd"));
        if ($content == "" || $content == NULL)
            return FALSE;
        foreach ($content as $key => $value) {
            if ($value['login'] == $login && $value['passwd'] == hash("sha256", $passwd))
                return TRUE;
        }
        return FALSE;
    }
?>