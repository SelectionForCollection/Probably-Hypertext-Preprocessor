<?php

$nickname = $_POST["nickname"];
$email = $_POST["email"];
$password = $_POST["password"];
$age = $_POST["age"];

require_once('boot.php');

$data = $pdo->query("SELECT id FROM developer WHERE email='$email';")->fetchAll();

if (count($data) != 0) {
    echo '<script language="javascript">';
    echo 'alert("Такая почта уже зарегистрирована, вы можете авторизоватиься. Если это вы...");';
    echo 'location.href="../authorization.php"';
    echo '</script>';

    exit;
}

$data = $pdo->query("SELECT id FROM developer WHERE nickname='$nickname';")->fetchAll();

if (count($data) != 0) {
    echo '<script language="javascript">';
    echo 'alert("Такой ник уже зарегистрирован. Выберите другой.");';
    echo 'location.href="../registration.php"';
    echo '</script>';

    exit;
}

$password = password_hash($password, PASSWORD_BCRYPT);
$pdo->query("INSERT INTO developer (id, nickname, email, password, age) VALUES (NULL, '$nickname', '$email', '$password', $age);");
header("Location: ../index.php");

?>
