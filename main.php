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
        <link rel="stylesheet" href="styles/main.css" type="text/css"/>
    </head>
    <body>
        <nav class="main-menu">
            <ul>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">CTO</span>
                            <input type="submit" name="btn1" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">SMP</span>
                            <input type="submit" name="btn2" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">YAP</span>
                            <input type="submit" name="btn3" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                        <span class="nav-text">OOP</span>
                        <input type="submit" name="btn4" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">FP</span>
                            <input type="submit" name="btn5" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_6</span>
                            <input type="submit" name="btn6" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_7</span>
                            <input type="submit" name="btn7" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_8</span>
                            <input type="submit" name="btn8" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_9</span>
                            <input type="submit" name="btn9" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_10</span>
                            <input type="submit" name="btn10" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">DEP_11</span>
                            <input type="submit" name="btn11" value="подписаться"/>
                    </form>
                </li>
            </ul>
        </nav>
        <ul class="pagination">
            <li><a href="?segment=1">Первая</a></li>
            <li class="<?php if($segment <= 1) { echo 'disabled'; } ?>">
                <a href="<?php if($segment > 1) { echo "?segment=".($segment - 1); } ?>">Назад</a>
            </li>
            <li class="<?php if($segment >= $total_pages) { echo 'disabled'; } ?>">
                <a href="<?php if($segment < $total_pages) { echo "?segment=".($segment + 1); } ?>">Вперед</a>
            </li>
            <li><a href="?segment=<?php echo $total_pages; ?>">Последняя</a></li>
        </ul>
    </body>
</html>
