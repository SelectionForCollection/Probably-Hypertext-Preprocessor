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
        <h1>Прикрепить </h1>
        <select>
            <?php
                $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                foreach ($data as $el) {
                    echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                }
            ?>
        </select>
        <h1> к отделу </h1>
        <select>
            <?php
                $data = $pdo->query("SELECT titleDepartment FROM department;")->fetchAll();
                foreach ($data as $el) {
                    echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                }
            ?>
        </select>
    </body>
</html>
