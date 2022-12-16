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
        <div class="container">
            <div class="qr-code-image">
                <img src="images/qrcode_github.com.png">
                <div class="text-qr-card">
                    <h2><?php echo $project; ?></h2>
                    <h2>Заказчик <?php echo $client; ?></h2>
                    <h2>Срок сдачи <?php echo $deadline; ?></h2>
                    <h2>Цена <span><?php echo $coast; ?></span></h2>
                </div>
            </div>
        </div>
    </body>
</html>