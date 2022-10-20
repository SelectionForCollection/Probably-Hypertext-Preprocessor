<html>
    <head>
        <link rel="stylesheet" href="styles/index.css" type="text/css"/>
    </head>
    <body>
        <form action="scripts/register.php" method="POST">
            <h2>Регистрация</h2>
            <input type="text" name="nickname" placeholder="ник" maxlength="20" required/>
            <input type="email" name="email" placeholder="почта" maxlength="35" required/>
            <input type="password" name="password" placeholder="пароль" maxlength="35" required/>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </body>
</html>
