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
                var_dump($data);
                foreach ($data as $el) {
                    echo '<option value="' . $el[1] . '">' . $el[1] . '</option>';
                }
                echo "Dalshe impovization\n";
                echo "data[1] - " . $data[1];
                echo "data[1][0] -" . $data[1][0];
                echo "data[1] - " . $data[1];
                echo "data[1][0] -" . $data[1][0];
            ?>
        </select>
    </body>
</html>
