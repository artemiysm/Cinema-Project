<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Пушкинская карта</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="../../index.php"><img class="logo" src="/assets/image/logo.png" alt=""></a></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="../auth/auth.html">Авторизация</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="sign_up">
        <div class="sign">
            <form action="sign.php" method="POST">
                <div class="signing">
                    <img class="logo2" src="../../assets/image/logo.png" alt="">
                    <p>Имя пользователя: </p>
                    <input class="sign_name" name="user" type="text"/>
                    <p>Пароль: </p>
                    <input class="sign_password" name="pasword" type="password"/>
                    <input class="submit" type="submit" value="Зарегистрироваться"/>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <footer>
            <nav>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Подарочные карты</a></li>
                    <li><a href="#">Расмотрение притензий</a></li>
                    <li><img class="logo" src="/assets/image/logo.png" alt=""></li>
                </ul>
            </nav>
        </footer>
    </div>
</body>
</html>
