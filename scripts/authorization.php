<?php

$email = $_POST["email"];
$password = $_POST["password"];

require_once('boot.php');

$data = $pdo->query("SELECT password FROM developer WHERE email='$email';")->fetchAll();

if (count($data) == 1 && password_verify($password, $data[0][0])) {
    setcookie("email", $email, time()+3600, "/scripts");
    setcookie("email", $email, time()+3600, "/");
    if ($email != "admin@admin") {
        setcookie("page_control", "toMain", time()+3600, "/");
        header("Location: ../main.php");
    } else {
        setcookie("page_control", "toAdministration", time()+3600, "/");
        header("Location: ../administration.php");
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("Неверные данные.");';
    echo 'location.href="../index.php"';
    echo '</script>';
}

?>
