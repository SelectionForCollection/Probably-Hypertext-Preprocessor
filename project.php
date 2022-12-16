<?php

require_once('scripts/boot.php');

if (isset($_GET['project'])) {
    $project = $_GET['project'];
} else {
    header("Location: /index.php");
}

$data = $pdo->query("SELECT idProject FROM project WHERE titleProject = '$project';")->fetchAll();
if ($data[0] == null) {
    echo '<script language="javascript">';
    echo 'alert("Такой проект отсутствует. Проверьту написание или отдел.");';
    echo 'location.href="project.php"';
    echo '</script>';
    exit;
}

$data = $pdo->query("SELECT idProject FROM project WHERE titleProject = '$project';")->fetchAll();
$idProject = $data[0][0];

$data = $pdo->query("SELECT client.titleClient FROM project LEFT JOIN client ON project.idClient_client=client.idClient WHERE idProject = $idProject;")->fetchAll();
$client = $data[0][0];

$data = $pdo->query("SELECT deadline FROM project WHERE idProject = $idProject;")->fetchAll();
$deadline = $data[0][0];

$data = $pdo->query("SELECT totalCoast FROM project WHERE idProject = $idProject;")->fetchAll();
$coast = $data[0][0];
?>

<html>
    <head>
        <title>Project</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="styles/project.css" type="text/css" />
    </head>
    <body>
        <img class="center" src="images/qrcode_github.com.png">
        <div class="main">
            <h2 class="titleProject"><?php echo $project; ?></h2>
            <div>
                <h2 class="left">Заказчик</h2>
                <h2 class="right"><?php echo $client; ?></h2>
            </div>
            <div>
                <h2 class="left">Срок сдачи</h2>
                <h2 class="right"><?php echo $deadline; ?></h2>
            </div>
            <div>
                <h2 class="left">Цена</h2>
                <h2 class="right"><?php echo $coast; ?></h2>
            </div>
        </div>
    </body>
</html>