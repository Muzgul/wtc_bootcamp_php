<?php include "php/account/admin.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>THIS IS A TITLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <nav>
        <h1>Welcome <?php echo is_logged() ?></h1>
        <p>header comes here...</p>
        <?php if (!is_logged()){ // if not logged in?>
            <a href="/html/create.html">CREATE</a>
            <a href="/html/login.html">LOGIN</a>
        <?php }else{ // else if logged in ?>
            <a href="/php/account/logout.php">LOGOUT</a>
            <a href="/php/account/whoami.php">Who am i?</a>
        <?php } ?>
    </nav>
    <div class="products">
        <p>display products here...</p>
        <table>
            <tr>
        <?php
            if (file_exists("data/products/products.csv")){
                $content = file_get_contents("data/products/products.csv");
                $content = preg_split("/\n/", $content); // Get the rows
                $headers = preg_split("/,/", $content[0]); // Fetch the headers from row 0 (split by ',')
                array_shift($content); // Remove the headers from the array
                $products = [];
                foreach ($content as $key => $value)
                    $products[$key] = preg_split("/,/", $value);
                foreach ($headers as $key => $value) {
            ?>
                <th><?php echo $value; ?></th>
            <?php
                }
            ?>
            </tr>
        <?php
                foreach ($products as $key => $value) {
        ?>
            <tr>
                <?php
                    foreach ($value as $k => $v) {
                        ?>
                        <td><?php echo $v; ?></td>
                        <?php
                    }
                ?>
            </tr>
        <?php
                }
            }
        ?>
        </table>
    </div>
</body>
</html>