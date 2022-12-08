<?php

$email = $_POST["email"];
$password = $_POST["password"];

require_once('boot.php');

$data = $pdo->query("SELECT password FROM developers WHERE email='$email';")->fetchAll();

if (count($data) == 1 && password_verify($password, $data[0][0])) {
    setcookie("email", $email, time()+3600, "/scripts");
    setcookie("email", $email, time()+3600, "/");
    setcookie("page_control", "index", time()+120, "/");
    header("Location: ../main.php");
} else {
    echo '<script language="javascript">';
    echo 'alert("Неверные данные.");';
    echo 'location.href="../index.php"';
    echo '</script>';
}

?>
