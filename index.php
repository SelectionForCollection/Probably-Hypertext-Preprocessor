<html>
    <head>
        <title>Auth</title>
        <link rel="stylesheet" href="styles/index.css" type="text/css" />
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <form action="scripts/authorization.php" method="POST">
            <h2>Авторизация</h2>
            <input type="email" name="email" placeholder="почта"/>
            <input type="password" name="password" placeholder="пароль"/>
            <button type="submit">Вход</button>
        </form>
        <a href="registration.php">Регистрация</a>
    </body>
</html>
