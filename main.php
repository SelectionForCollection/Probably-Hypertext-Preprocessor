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

$data = $pdo->query("SELECT rang.titleRang FROM developer LEFT JOIN rang ON developer.rang=rang.idRang WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$rang = $data[0][0];

$data = $pdo->query("SELECT department.titleDepartment FROM developer LEFT JOIN department ON developer.department=department.idDepartment WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$dep = $data[0][0];

$data = $pdo->query("SELECT age FROM developer WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$age = $data[0][0];

$data = $pdo->query("SELECT language.titleLanguage FROM developer LEFT JOIN language ON developer.language=language.idLanguage WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$language = $data[0][0];

$data = $pdo->query("SELECT area.titleArea FROM developer LEFT JOIN area ON developer.area=area.idArea WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
$area = $data[0][0];
?>
<html>
    <head>
        <title>Main</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="styles/main.css" type="text/css"/>
    </head>
    <body>
        <div class="main">
            <div class="card">
                <div class="additional">
                    <div class="user-card">
                        <img class="center" src="images/what_after.jpg" wigth="100" height="100"/>
                    </div>
                    <div class="more-info">
                        <h1><?php echo $nickname; ?></h1>
                        <div class="coords">
                            <span>Возраст</span>
                            <span><?php echo $age; ?></span>
                        </div>
                        <div class="coords">
                            <span>Уровень</span>
                            <span><?php echo $rang; ?></span>
                        </div>
                        <div class="stats">
                            <div>
                                <img width="24" height="24" src="images/code-solid.svg"/>
                                <div class="value"><?php echo $language ?></div>
                            </div>
                            <div>
                                <img width="24" height="24" src="images/compass-regular.svg"/>
                                <div class="value"><?php echo $area ?></div>
                            </div>
                            <div>
                                <img width="24" height="24" src="images/house-laptop-solid.svg"/>
                                <div class="value"><?php echo $dep ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="general">
                    <h1><?php echo $nickname; ?></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a volutpat mauris, at molestie lacus. Nam vestibulum sodales odio ut pulvinar.</p>
                </div>
            </div>
        </div>
        <div class="second">
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
        </div>
    </body>
</html>
