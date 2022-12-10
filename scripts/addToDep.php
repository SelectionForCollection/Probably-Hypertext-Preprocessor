<?php

    print_r($_POST["firstDevs"]);
    $dev = $_POST["firstDevs"];
    print_r($dev);
    $dep = $_POST["firstDeps"];

    require_once("scripts/boot.php");

    $data = $pdo->query("SELECT idDepartment FROM department WHERE titleDepartment = '" . $dep . "';")->fetchAll();
    $pdo->query("UPDATE developer SET department = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>