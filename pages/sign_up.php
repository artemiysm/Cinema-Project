<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
if (isset($_POST['user']) && isset($_POST['pasword'])){
  // Переменные с формы
  $user = $_POST['user'];
  $pasword = $_POST['pasword'];
  
  // Параметры для подключения
  $db_host = "127.127.126.26"; 
  $db_user = "root"; // Логин БД
  $db_password = "^ruS7]u56^£L"; // Пароль БД
  $db_base = 'kino'; // Имя БД
  $db_table = "users"; // Имя Таблицы БД
  
try {
      // Подключение к базе данных
      $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
      // Устанавливаем корректную кодировку
      $db->exec("set names utf8");
      // Собираем данные для запроса
      $data = array( 'user' => $user, 'pasword' => $pasword ); 
      // Подготавливаем SQL-запрос
      $query = $db->prepare("INSERT INTO $db_table (user, pasword) values (:user, :pasword)");
      // Выполняем запрос с данными
      $query->execute($data);
      
  } 
catch (PDOException $e) {
    // Если есть ошибка соединения или выполнения запроса, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
  }
}

?>


</body>
</html>