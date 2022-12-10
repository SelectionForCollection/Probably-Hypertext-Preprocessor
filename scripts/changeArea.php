<?php
    $dev = $_POST["3Devs"];
    $area = $_POST["Areas"];

    require_once("boot.php");

    $data = $pdo->query("SELECT idArea FROM area WHERE titleArea = '" . $area . "';")->fetchAll();
    $pdo->query("UPDATE developer SET area = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>