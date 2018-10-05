<?php #!/usr/bin/php
    $message = "ERROR\n";
    $session = "loggued_on_user";
    if ($_SESSION && $_SESSION[$session] != NULL && $_SESSION[$session] != "")
        $message = $_SESSION[$session] . "\n";
    echo $message;
?>