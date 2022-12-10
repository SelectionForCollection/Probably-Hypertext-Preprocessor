<?php

    print_r($_POST);

    require_once("scripts/boot.php");

    $dev = $_POST["firstDevs"];
    $dep = $_POST["firstDeps"];

    $data = $pdo->query("SELECT idDepartment FROM department WHERE titleDepartment = '" . $dep . "';")->fetchAll();
    $pdo->query("UPDATE developer SET department = " . $data[0][0] . " WHERE developer.nickname = '" . $dev . "';");

    header("Location: ../administration.php");
?>