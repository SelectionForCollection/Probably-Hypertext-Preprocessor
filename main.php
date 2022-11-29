<?php

// Поверка, есть ли GET запрос
if (isset($_GET['pageno'])) {
    // Если да то переменной $pageno присваиваем его
    $pageno = $_GET['pageno'];
} else { // Иначе
    // Присваиваем $pageno один
    $pageno = 1;
}
 
// Назначаем количество данных на одной странице
$size_page = 5;
// Вычисляем с какого объекта начать выводить
$offset = ($pageno-1) * $size_page;

$total_rows = $pdo->query("SELECT COUNT(*) FROM subscriptions;")->fetchAll()[0];
echo $total_rows;
// Вычисляем количество страниц
$total_pages = ceil($total_rows / $size_page);

if (isset($_POST["my_subs"])) {
    require_once('scripts/boot.php');
    $data = $pdo->query("SELECT id FROM users WHERE email='" . $_COOKIE["email"] . "';")->fetchAll();
    $idUser = $data[0][0];
    $data = $pdo->query("SELECT nickname, title FROM users
                         LEFT JOIN user_subscription ON users.id=user_subscription.id_user
                         LEFT JOIN subscriptions ON user_subscription.id_subscription=subscriptions.id
                         WHERE users.id=$idUser;")->fetchAll();
    echo "<div class='subs'>";
    foreach ($data as $el) {
         echo  $el[1] . "</br>\n";
    }
    echo "</div>";
}

if (isset($_COOKIE["page_control"])) {
    if ($_COOKIE["page_control"] <> "index") {
        header("Location: /");
    }
} else header("Location: /");

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
        <form action="main.php" method="POST">
            <input type="submit" name="my_subs" value="мои подписки"/>
        </form>
    </body>
</html>
