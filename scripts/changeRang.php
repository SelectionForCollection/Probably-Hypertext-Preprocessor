<?php
    $dev = $_POST["2Devs"];
    $rang = $_POST["Rangs"];

    require_once("boot.php");

    $data = $pdo->query("SELECT idRang FROM rang WHERE titleRang = '" . $rang . "';")->fetchAll();
    $pdo->query("UPDATE developer SET rang = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>