<?php

if (isset($_COOKIE["page_control"])) {
    if ($_COOKIE["page_control"] <> "toAdministration") {
        header("Location: /");
    }
} else header("Location: /");

require_once('scripts/boot.php');

?>
<html>
    <head>
        <title>Administration</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="styles/administration.css" type="text/css"/>
    </head>
    <body>
        <select>
            <?php
                $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                foreach ($data[0] as $n=>$opt) {
                     printf('<option value="%s">%s</option>', $n, $opt);
                }
            ?>
        </select>
    </body>
</html>
