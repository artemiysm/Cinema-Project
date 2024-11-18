<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start(); // Начинаем сессию для хранения информации о пользователе

if (isset($_POST['user']) && isset($_POST['pasword'])) {
    // Переменные с формы
    $user = $_POST['user'];
    $pasword = $_POST['pasword'];

    // Параметры для подключения к базе данных
    $db_host = "127.127.126.26"; 
    $db_user = "root"; 
    $db_password = "^ruS7]u56^£L"; 
    $db_base = 'kino'; 
    $db_table = "users";

    // Подключение к базе данных
    $con = new mysqli($db_host, $db_user, $db_password, $db_base);

    // Проверка соединения
    if ($con->connect_error) {
        die("Ошибка подключения: " . $con->connect_error);
    }

    // Устанавливаем корректную кодировку
    $con->set_charset("utf8");

    // Подготовка SQL-запроса для получения хеша пароля и роли
    $query = $con->prepare("SELECT pasword, role_id FROM $db_table WHERE user = ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($hashed_password_from_db, $role_id);
    $query->fetch();
    $query->close();

    // Проверка пароля
    if ($hashed_password_from_db && password_verify($pasword, $hashed_password_from_db)) {
        // Пароль верный, проверяем роль пользователя
        if ($role_id == 2) { // Предполагаем, что роль администратора имеет role_id = 2
            echo "Добро пожаловать, администратор!";
        }

        // Сохраняем информацию о пользователе в сессии
        $_SESSION['user'] = $user;
        $_SESSION['role_id'] = $role_id;

        // Перенаправляем пользователя на главную страницу после успешной авторизации
        
        exit();
    } else {
        // Неверный пароль или пользователь не найден
        echo 'Неправильный логин или пароль';
    }

    // Закрываем соединение
    $con->close();
}
?>
</body>
</html>