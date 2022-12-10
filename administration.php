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
        <form class="administration" action="scripts/changeDep.php" method="POST">
            <h1>Добавить </h1>
            <select name="1Devs">
                <?php
                    $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <h1> к отделу </h1>
            <select name="Deps">
                <?php
                    $data = $pdo->query("SELECT titleDepartment FROM department;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <button>Добавить</button>
        </form>
        <form class="administration" action="scripts/changeRang.php" method="POST">
            <h1>Присвоить </h1>
            <select name="2Devs">
                <?php
                    $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <h1> уровень </h1>
            <select name="Rangs">
                <?php
                    $data = $pdo->query("SELECT titleRang FROM rang;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <button>Добавить</button>
        </form>
        <form class="administration" action="scripts/changeArea.php" method="POST">
            <h1>Изменить область для </h1>
            <select name="3Devs">
                <?php
                    $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <h1> на </h1>
            <select name="Areas">
                <?php
                    $data = $pdo->query("SELECT titleArea FROM area;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <button>Добавить</button>
        </form>
        <form class="administration" action="scripts/changeLanguage.php" method="POST">
            <h1>Изменить основной язык для </h1>
            <select name="4Devs">
                <?php
                    $data = $pdo->query("SELECT nickname FROM developer;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <h1> на </h1>
            <select name="Languages">
                <?php
                    $data = $pdo->query("SELECT titleLanguage FROM language;")->fetchAll();
                    foreach ($data as $el) {
                        echo '<option value="' . $el[0] . '">' . $el[0] . '</option>';
                    }
                ?>
            </select>
            <button>Добавить</button>
        </form>
    </body>
</html>
