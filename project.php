<?php
if (isset($_GET['project'])) {
    $project = $_GET['project'];
} else {
    $project = "ниче не получилось";
}

require_once('scripts/boot.php');

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
                <h2>Заказчик</h2>
                <span><?php echo $client; ?></span>
            </div>
            <div>
                <h2>Срок сдачи</h2>
                <span><?php echo $deadline; ?></span>
            </div>
            <div>
                <h2>Цена</h2>
                <span><?php echo $coast; ?></span>
            </div>
        </div>
    </body>
</html>