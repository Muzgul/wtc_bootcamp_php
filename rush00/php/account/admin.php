<?php #!/usr/bin/php
    session_start();
    function is_logged(){
        $session = "loggued_on_user";
        if ($_SESSION[$session] != "")
            return $_SESSION[$session];
        return FALSE;
    }
?>