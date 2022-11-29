<?php

require_once('boot.php');
$email = $_COOKIE['email'];

$data = $pdo->query("SELECT id FROM developers WHERE email='$email';")->fetchAll();
$idDev = $data[0][0];

if (isset($_POST["btn1"])) {
    $idDep = 1;
} elseif (isset($_POST["btn2"])) {
    $idDep = 2;
} elseif (isset($_POST["btn3"])) {
    $idDep = 3;
} elseif (isset($_POST["btn4"])) {
    $idDep = 4;
} elseif (isset($_POST["btn5"])) {
    $idDep = 5;
} elseif (isset($_POST["btn6"])) {
    $idDep = 6;
} elseif (isset($_POST["btn7"])) {
    $idDep = 7;
} elseif (isset($_POST["btn8"])) {
    $idDep = 8;
} elseif (isset($_POST["btn9"])) {
    $idDep = 9;
} elseif (isset($_POST["btn10"])) {
    $idDep = 10;
} elseif (isset($_POST["btn11"])) {
    $idDep = 11;
} else {
    exit;
}

$data = $pdo->query("SELECT id_dep FROM dev_dep WHERE id_dev=$idDev;")->fetchAll();
foreach ($data as $el) {
    if ($el[0] == $idDep) {
        echo '<script language="javascript">';
        echo 'alert("Вы уже подписаны на этот канал.");';
        echo 'location.href="../main.php"';
        echo '</script>';
        exit;
    }
}
$pdo->query("INSERT INTO dev_dep (id_dev, id_dep) VALUES ($idDev, $idDep);");
header("Location: ../main.php");
?>
