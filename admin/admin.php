<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Пушкинская карта</a></li>
                    <li><a href="#">О нас</a></li>
                    
                        <img class="logo" src="/assets/image/logo.png" alt="">
                    <li><a href="#">Новости</a></li>
                    <li><a href="/pages/auth/auth.html">Авторизация</a></li>
    
                </ul>
                
            </nav>
            
        </header>
    </div>
    <div class="sign_up">
        <div class="sign">
            
        <form action="admin_auth.php" method="POST">
            <div class="signing">
                <img class="logo2" src="../../assets/image/logo.png" alt="">
                <p>Имя пользователя: </p>
            <input class ="sign_name" name="user" type="text" id="user"/>
            <p>Пароль: </p>
            <input class="sign_password" name="pasword" type="password" id="password"/>
            <input class = "submit" type="submit" value="Войти"/>
            <a href="../pages/sign/sign_up.php"><p>Ещё не зарегистрированны?</p></a>
            </div>
</div>
    </div>
    <div class="footer">
        <footer>
            <nav>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Подарочные карты</a></li>
                    <li><a href="#">Расмотрение притензий</a></li>

                    <img class="logo" src="/assets/image/logo.png" alt="">
    
                </ul>
                
            </nav>
        </footer>
    </div>

</form>
</body>
</html>
    