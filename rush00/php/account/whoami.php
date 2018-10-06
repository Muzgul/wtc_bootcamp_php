<?php #!/usr/bin/php
    session_start();
    $message = "ERROR\n";
    $session = "loggued_on_user";
    if ($_SESSION[$session] != "")
        $message = $_SESSION[$session] . "\n";
    echo $message;
?>