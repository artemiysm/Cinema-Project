<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
if (isset($_POST['user']) && isset($_POST['pasword'])) {
  // Переменные с формы
  $user = $_POST['user'];
  $pasword = $_POST['pasword'];
  $pass = password_hash($pasword, PASSWORD_BCRYPT);

  // Параметры для подключения
  $db_host = "127.127.126.26"; 
  $db_user = "root";
  $db_password = "^ruS7]u56^£L";
  $db_base = 'kino';
  $db_table = 'users'; // Определяем таблицу

  // Подключение к базе данных через mysqli
  $con = new mysqli($db_host, $db_user, $db_password, $db_base);

  // Проверка соединения
  if ($con->connect_error) {
      die("Ошибка подключения: " . $con->connect_error);
  }

  // Устанавливаем корректную кодировку
  $con->set_charset("utf8");

  // Подготавливаем SQL-запрос
  $query = $con->prepare("INSERT INTO $db_table (user, pasword) VALUES (?, ?)");
  if ($query === false) {
      die("Ошибка подготовки запроса: " . $con->error);
  }

  // Привязываем параметры и выполняем запрос
  $query->bind_param("ss", $user, $pass);
  if ($query->execute()) {
      // Перенаправляем пользователя
      header('Location: https://cinema-chaika/');
      exit();
  } else {
      echo "Ошибка выполнения запроса: " . $query->error;
  }

  // Закрываем соединение
  $query->close();
  $con->close();
}
?>

</body>
</html>
