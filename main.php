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
                     LEFT JOIN user_subscription ON developers.id=user_subscription.id_user
                     LEFT JOIN departments ON user_subscription.id_subscription=departments.id
                     WHERE developers.id=$idUser LIMIT $offset, $size;")->fetchAll();

foreach ($data as $el) {
     echo  $el[1] . "</br>";
}

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
                            <span class="nav-text">Образовательный канал</span>
                            <input type="submit" name="btn1" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">Развлекательный канал</span>
                            <input type="submit" name="btn2" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">Еще какой-нибудь канал</span>
                            <input type="submit" name="btn3" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                        <span class="nav-text">Суэцкий канал</span>
                        <input type="submit" name="btn4" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 5</span>
                            <input type="submit" name="btn5" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 6</span>
                            <input type="submit" name="btn6" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 7</span>
                            <input type="submit" name="btn7" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 8</span>
                            <input type="submit" name="btn8" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 9</span>
                            <input type="submit" name="btn9" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 10</span>
                            <input type="submit" name="btn10" value="подписаться"/>
                    </form>
                </li>
                <li>
                    <form action="scripts/subscribe.php" method="POST">
                            <span class="nav-text">КАНАЛ 11</span>
                            <input type="submit" name="btn11" value="подписаться"/>
                    </form>
                </li>
            </ul>
        </nav>
        <ul class="pagination">
            <li><a href="?segment=1">First</a></li>
            <li class="<?php if($segment <= 1) { echo 'disabled'; } ?>">
                <a href="<?php if($segment > 1) { echo "?segment=".($segment - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($segment >= $total_pages) { echo 'disabled'; } ?>">
                <a href="<?php if($segment < $total_pages) { echo "?segment=".($segment + 1); } ?>">Next</a>
            </li>
            <li><a href="?segment=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </body>
</html>
