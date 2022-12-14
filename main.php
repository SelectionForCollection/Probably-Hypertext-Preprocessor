<?php

$email = $_COOKIE["email"];

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

$data = $pdo->query("SELECT nickname FROM developer WHERE email='$email';")->fetchAll();
$nickname = $data[0][0];

$data = $pdo->query("SELECT rang.titleRang FROM developer LEFT JOIN rang ON developer.rang=rang.idRang WHERE email='$email';")->fetchAll();
$rang = $data[0][0];

$data = $pdo->query("SELECT department.titleDepartment FROM developer LEFT JOIN department ON developer.department=department.idDepartment WHERE email='$email';")->fetchAll();
$dep = $data[0][0];

$data = $pdo->query("SELECT age FROM developer WHERE email='$email';")->fetchAll();
$age = $data[0][0];

$data = $pdo->query("SELECT language.titleLanguage FROM developer LEFT JOIN language ON developer.language=language.idLanguage WHERE email='$email';")->fetchAll();
$language = $data[0][0];

$data = $pdo->query("SELECT area.titleArea FROM developer LEFT JOIN area ON developer.area=area.idArea WHERE email='$email';")->fetchAll();
$area = $data[0][0];

$data = $pdo->query("SELECT idDepartment FROM department WHERE titleDepartment = '$dep';")->fetchAll();
$idDep = $data[0][0];

$data = $pdo->query("SELECT COUNT(*) FROM department_project WHERE idDepartment = $idDep;")->fetch();
$total_rows = $data[0];

$total_pages = ceil($total_rows / $size);

$data = $pdo->query("SELECT project.titleProject FROM department_project 
                    LEFT JOIN project ON department_project.idProject=project.idProject
                    WHERE idDepartment = $idDep LIMIT $offset, $size;")->fetchAll();

echo '<div class="projects"><ul class="output">';
foreach ($data as $el) {
     echo "<li><a href='/project.php?project=$el[0]'>" . $el[0] . "</a></li>";
}
echo '</ul></div>';


?>
<html>
    <head>
        <title>Main</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="styles/main.css" type="text/css" />
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
                            <span>??????????????</span>
                            <span><?php echo $age; ?></span>
                        </div>
                        <div class="coords">
                            <span>??????????????</span>
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
        <h1 class="second">?????????????? ???????????? <?php echo $dep; ?></h1>
        <form class="search" action="scripts/search.php" method="POST">
            <input type="text" class="searchInput" name="search" placeholder="?????????? ?????????? ???????????? ?????????? ???????????? ????????????" />
            <input type="image" class="searchButton" src="images/magnifying-glass-solid.svg" width="40" height="40" />
        </form>
        <ul class="pagination">
            <li>
                <a href="?segment=1">????????????</a>
            </li>
            <li class="<?php if($segment <= 1) { echo 'disabled'; } ?>">
                <a href="<?php if($segment > 1) { echo "?segment=" . ($segment - 1); } ?>">??????????</a>
            </li>
            <li class="<?php if($segment >= $total_pages) { echo 'disabled'; } ?>">
                <a href="<?php if($segment < $total_pages) { echo "?segment=" . ($segment + 1); } ?>">????????????</a>
            </li>
            <li>
                <a href="?segment=<?php echo $total_pages; ?>">??????????????????</a>
            </li>
        </ul>
    </body>
</html>
