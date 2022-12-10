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
                foreach ($data as $el) {
                    printf('<option value="' . $el[1] . '">' . $el[1] . '</option>');
                }
            ?>
        </select>
    </body>
</html>
