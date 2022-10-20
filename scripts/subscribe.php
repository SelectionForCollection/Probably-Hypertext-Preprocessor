<?php

require_once('boot.php');
$email = $_COOKIE['email'];

$data = $pdo->query("SELECT id FROM users WHERE email='$email';")->fetchAll();
$idUser = $data[0][0];

if (isset($_POST["btn1"])) {
    $idSub = 1;
} elseif (isset($_POST["btn2"])) {
    $idSub = 2;
} elseif (isset($_POST["btn3"])) {
    $idSub = 3;
} elseif (isset($_POST["btn4"])) {
    $idSub = 4;
} else {
    exit;
}

$data = $pdo->query("SELECT id_subscription FROM user_subscription WHERE id_user=$idUser;")->fetchAll();
foreach ($data as $el) {
    if ($el[0] == $idSub) {
        echo '<script language="javascript">';
        echo 'alert("Вы уже подписаны на этот канал.");';
        echo 'location.href="../main.php"';
        echo '</script>';
        exit;
    }
}
$pdo->query("INSERT INTO user_subscription (id_user, id_subscription) VALUES ($idUser, $idSub);");
header("Location: ../main.php");
?>
