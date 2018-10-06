<?php #!/usr/bin/php
    session_start();
    $session = "loggued_on_user";
    $_SESSION[$session] = "";
    echo "Logged out!\n";
?>