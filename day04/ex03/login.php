<?php #!/usr/bin/php
    include "auth.php";
    session_start();

    $message = "ERROR\n";
    $session = "loggued_on_user";
    if ($_GET['login'] && $_GET['passwd'])
    {
        $login = $_GET['login'];
        $passwd = $_GET['passwd'];
        if (auth($login, $passwd) == TRUE)
        {
            $message = "OK";
            $_SESSION[$session] = $login;
        }
        else
            $_SESSION[$session] = "";
    }
    echo $message;
?>