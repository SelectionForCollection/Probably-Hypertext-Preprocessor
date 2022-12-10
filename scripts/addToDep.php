<?php

    require_once("scripts/boot.php");

    $dev = $_POST["firstDevs"];
    $dep = $_POST["firstDeps"];
    echo 1;
    $data = $pdo->query("SELECT idDepartment FROM department WHERE titleDepartment = '" . $dep . "';")->fetchAll();
    echo 2;
    $pdo->query("UPDATE developer SET department = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>