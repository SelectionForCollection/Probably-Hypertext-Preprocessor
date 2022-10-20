<?php

$nickname = $_POST["nickname"];
$email = $_POST["email"];
$password = $_POST["password"];

require_once('boot.php');

$data = $pdo->query("SELECT id FROM users WHERE email='$email';")->fetchAll();

if (count($data) != 0) {
    echo '<script language="javascript">';
    echo 'alert("Такая почта уже зарегистрирована, вы можете авторизоватиься. Если это вы...");';
    echo 'location.href="../authorization.php"';
    echo '</script>';

    exit;
}

$data = $pdo->query("SELECT id FROM users WHERE nickname='$nickname';")->fetchAll();

if (count($data) != 0) {
    echo '<script language="javascript">';
    echo 'alert("Такой ник уже зарегистрирован. Выберите другой.");';
    echo 'location.href="../registration.php"';
    echo '</script>';

    exit;
}

$password = password_hash($password, PASSWORD_BCRYPT);
$pdo->query("INSERT INTO users (id, nickname, email, password) VALUES (NULL, '$nickname', '$email', '$password');");
header("Location: ../index.php");

?>
