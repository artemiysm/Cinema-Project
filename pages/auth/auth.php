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
  $user = $_POST['user'];
  $pasword = $_POST['pasword'];
  $pass = password_hash($pasword,PASSWORD_BCRYPT);
  $hash = $pass;
  
  // Параметры для подключения
  $db_host = "127.127.126.26"; 
  $db_user = "root"; // Логин БД
  $db_password = "^ruS7]u56^£L"; // Пароль БД
  $db_base = 'kino'; // Имя БД
  $db_table = "users"; // Имя Таблицы БД

  if (password_verify($pasword,$hash)){
    echo 'Pasword correct';
  }
  else{
    echo 'Password incorrect';
  }
}
  

?>


</body>
</html>