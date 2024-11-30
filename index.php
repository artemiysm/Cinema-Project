<?php
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['add_to_cart'])) {
    $product_name = $_GET['add_to_cart'];
    $product_price = $_GET['price'];
    if (isset($_SESSION['cart'][$product_name])) {
        $_SESSION['cart'][$product_name]['quantity']++;
    } else {
        $_SESSION['cart'][$product_name] = ['quantity' => 1, 'price' => $product_price];
    }
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style/style2.css">
    <link rel="stylesheet" href="/style/basket.css">
</head>
<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Пушкинская карта</a></li>
                    <li><a href="/pages/about/about.php">О нас</a></li>
                    <img class="logo2" src="assets/image/logo.png" alt="">
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
    <div class="promo">
        <img class="promo-img" src="assets/image/promo.jpg">
    </div>
    <div class="images">
        <?php
        include('Mysql_connect.php');
        $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_base);

        
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM picture";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (isset($row['NAME']) && isset($row['PRICE'])) {
                    echo   '<div class="card">
                                <a href="index.php?add_to_cart=' . urlencode($row['NAME']) . '&price=' . urlencode($row['PRICE']) . '"><img src="assets/image/' . $row['picture'] . '" class="card-img" alt="Добавить в корзину"></a>
                                <div class="card-title">' . $row['NAME'] . '</div>
                                <div class="card-price">' . $row['PRICE'] . ' руб.</div>
                            </div>';
                } else {
                    echo 'Ошибка: ключ "NAME" или "PRICE" не найден в массиве данных.';
                }
            }
            mysqli_free_result($result);
        } else {
            echo "Ошибка выполнения запроса: " . mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
        ?>
    </div>
    <div class="footer">
        <footer>
            <nav>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Подарочные карты</a></li>
                    <div class="logo-card"></div>
                    <li><a href="#">Расмотрение претензий</a></li>
                    <img class="logo2" src="assets/image/logo.png" alt="">
                </ul>
            </nav>
        </footer>
    </div>
</body>
</html>
