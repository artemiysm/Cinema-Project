<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/style2.css">
    <link rel="stylesheet" href="../../style/basket.css">
</head>
<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Пушкинская карта</a></li>
                    <li><a href="/pages/about/about.html">О нас</a></li>
                    <img class="logo2" src="../../assets/image/logo.png" alt="">
                    <li><a href="#">Новости</a></li>

                    <?php
                    if (isset($_SESSION["username"])) {
                        echo '<li><a href="pages/auth/logout.php">Выйти</a></li>';
                    } else {
                        echo '<li><a href="pages/auth/auth.html">Авторизация</a></li>';
                    }

                    if (isset($_SESSION["username"])) {
                        echo '<li><a href="/pages/basket/cart.php">Корзина (' . array_sum(array_column($_SESSION['cart'], 'quantity')) . ')</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </header>
    </div>
    <div class="about_img">
        <p>Chaika cinema - одна из крупнеиших российских кинопрокатных сетей.</p>
        <br>
        <p>Двадцатилетний опыт работы позволяет нам создавать кинокомплексы, отвечающие самым передовым технологиям
            кинопроката и индустрии развлечений.</p>
        <br>
        <p>Наши кинотеатры соотвествуют мировым стандартам качества кинопоказа.</p>
        <br>
        <p>Современные видео и аудио-системы, а также комвортные кресла позволяют зрителю полностью окунуться в
            атмосферу кино и получить максимум удовольствия от просмотра.</p>
    </div>
</body>

</html>
</body>

</html>