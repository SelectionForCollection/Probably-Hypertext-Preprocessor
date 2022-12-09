<?php

if (isset($_COOKIE["page_control"])) {
    if ($_COOKIE["page_control"] <> "toMain") {
        header("Location: /");
    }
} else header("Location: /");

require_once('scripts/boot.php');

if (isset($_GET['segment'])) {
    $segment = $_GET['segment'];
} else {
    $segment = 1;
}
 
$size = 5;
$offset = ($segment-1) * $size;

$data = $pdo->query("SELECT COUNT(*) FROM department;")->fetch();
$total_rows = $data[0];

$total_pages = ceil($total_rows / $size);
/*
$data = $pdo->query("SELECT id FROM developer WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$idUser = $data[0][0];
$data = $pdo->query("SELECT nickname, title FROM developers
                     LEFT JOIN dev_dep ON developers.id=dev_dep.id_dev
                     LEFT JOIN departments ON dev_dep.id_dep=departments.id
                     WHERE developers.id=$idUser LIMIT $offset, $size;")->fetchAll();

echo '<ul class="output">';
foreach ($data as $el) {
     echo "<li>" . $el[1] . "</li>";
}
echo '</ul>';
*/
$data = $pdo->query("SELECT nickname FROM developer WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$nickname = $data[0][0];

$data = $pdo->query("SELECT rang.titlerang FROM developer LEFT JOIN rang ON developer.rang=rang.idRang WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$rang = $data[0][0];

?>
<html>
    <head>
        <title>Main</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="styles/main.css" type="text/css"/>
    </head>
    <body>
        <div class="user-profile">
            <img class="avatar" src="images/what.jpg" />
            <div class="username"><?php echo $nickname; ?></div>
            <div class="bio"><?php echo $rang; ?>></div>
            <div class="description">
                I use to design websites and applications
                for the web.
            </div>
            <ul class="data">
                <li>
                    <span> 127</span>
                </li>
                <li>
                    <span> 853</span>
                </li>
                <li>
                    <span> 311</span>
                </li>
            </ul>
        </div>
        <h1 class="title-departments">Состоите в отделах:</h1>
        <ul class="pagination">
            <li>
                <a href="?segment=1">Первая</a>
            </li>
            <li class="<?php if($segment <= 1) { echo 'disabled'; } ?>">
                <a href="<?php if($segment > 1) { echo "?segment=" . ($segment - 1); } ?>">Назад</a>
            </li>
            <li class="<?php if($segment >= $total_pages) { echo 'disabled'; } ?>">
                <a href="<?php if($segment < $total_pages) { echo "?segment=" . ($segment + 1); } ?>">Вперед</a>
            </li>
            <li>
                <a href="?segment=<?php echo $total_pages; ?>">Последняя</a>
            </li>
        </ul>
    </body>
</html>
