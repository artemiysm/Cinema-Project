<?php
session_start();

// Обработка удаления товара из корзины
if (isset($_GET['remove_from_cart'])) {
    $product_name = urldecode($_GET['remove_from_cart']);
    if (isset($_SESSION['cart'][$product_name])) {
        if ($_SESSION['cart'][$product_name]['quantity'] > 1) {
            $_SESSION['cart'][$product_name]['quantity']--;
        } else {
            unset($_SESSION['cart'][$product_name]);
        }
    }
    header("Location: cart.php");
    exit;
}

// Обработка оплаты
if (isset($_POST['checkout'])) {
    // Здесь можно добавить логику для обработки оплаты
    // Например, сохранение данных о покупке в базе данных
    // После успешной оплаты можно очистить корзину
    $_SESSION['cart'] = [];
    header("Location: thank_you.php"); // Перенаправление на страницу благодарности
    exit;
}

// Проверка, существует ли корзина
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Ваша корзина пуста.";
    echo ' <li><a href="../../index.php">На главную</a></li>';
    exit;
}

// Подсчет общей стоимости
$total_price = 0;
foreach ($_SESSION['cart'] as $product_name => $details) {
    if (is_array($details) && isset($details['quantity']) && isset($details['price'])) {
        $total_price += $details['quantity'] * $details['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="../../style/style2.css">
    <link rel="stylesheet" href="../../style/basket.css">
    <style>
        
    </style>
</head>
<body>
    <div class="header">
        <header>
            <nav>
                <ul>
                    <li><a href="#">Пушкинская карта</a></li>
                    <li><a href="#">О нас</a></li>
                    <img class="logo2" src="../../assets/image/logo.png" alt="">
                    <li><a href="#">Новости</a></li>
                    <li><a href="../../index.php">На главную</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="cart-content">
        <h2>Ваша корзина</h2>
        <ul>
            <?php
            foreach ($_SESSION['cart'] as $product_name => $details) {
                if (is_array($details) && isset($details['quantity']) && isset($details['price'])) {
                    echo '<li class="cart-item">
                            <div class="item-details">
                                <div class="item-name">' . $product_name . '</div>
                                <div class="item-price">Количество: ' . $details['quantity'] . '</div>
                                <div class="item-price">Цена: ' . $details['price'] . ' руб.</div>
                            </div>
                            <a href="cart.php?remove_from_cart=' . urlencode($product_name) . '" class="remove-link">Удалить</a>
                          </li>';
                }
            }
            ?>
        </ul>
        <div class="total-price">
            Общая стоимость: <?php echo $total_price; ?> руб.
        </div>
        <form method="POST" action="">
            <button type="submit" name="checkout" class="checkout-button">Оплатить</button>
        </form>
    </div>
</body>
</html>
