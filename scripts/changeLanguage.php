<?php
    $dev = $_POST["4Devs"];
    $lang = $_POST["Languages"];

    require_once("boot.php");

    $data = $pdo->query("SELECT idLanguage FROM language WHERE titleLanguage = '" . $lang . "';")->fetchAll();
    $pdo->query("UPDATE developer SET language = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>