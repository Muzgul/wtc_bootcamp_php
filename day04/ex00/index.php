<?php #!/usr/bin/php
    session_start();
    if ($_GET['submit'] == "OK")
    {
        if ($_GET['login'] && $_GET['passwd'])
        {
            $_SESSION['login'] = $_GET['login'];
            $_SESSION['passwd'] = $_GET['passwd'];
        }
    }
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
?>
<html>
    <body>
        <form method="GET" action="index.php">
            Username: <input type="text" name="login" value="<?php echo $login; ?>">
            <br/>
            Password: <input type="password" name="passwd" value="<?php echo $passwd; ?>">
            <input type="submit" value="OK">
        </form>
    </body>
</html>