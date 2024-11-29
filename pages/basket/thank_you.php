<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Спасибо за покупку</title>
    <link rel="stylesheet" href="../../style/style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .back-to-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
        }
        .back-to-home:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Спасибо за покупку!</h1>
    <p>Ваш заказ успешно оформлен. Мы свяжемся с вами в ближайшее время для подтверждения.</p>
    <a href="../../index.php" class="back-to-home">Вернуться на главную</a>
</body>
</html>
