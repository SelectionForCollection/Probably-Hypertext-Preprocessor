<?php

if (isset($_COOKIE["page_control"])) {
    if ($_COOKIE["page_control"] <> "index") {
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

$data = $pdo->query("SELECT COUNT(*) FROM departments;")->fetch();
$total_rows = $data[0];

$total_pages = ceil($total_rows / $size);

$data = $pdo->query("SELECT id FROM developers WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
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
?>
<html>
    <head>
        <title>Main</title>
        <link type="image/x-icon" href="images/favicon.ico" rel="shortcut icon"/>
        <link rel="stylesheet" href="styles/main.css" type="text/css"/>
    </head>
    <body>
        <div class="user-profile">
            <img class="avatar" src="images/ava.png" />
            <div class="username">Will Smith</div>
            <div class="bio">Senior UI Designer</div>
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
