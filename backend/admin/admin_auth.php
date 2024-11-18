<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start(); 

if (isset($_POST['user']) && isset($_POST['pasword'])) {
 
    $user = $_POST['user'];
    $pasword = $_POST['pasword'];


    $db_host = "127.127.126.26"; 
    $db_user = "root"; 
    $db_password = "^ruS7]u56^£L"; 
    $db_base = 'kino'; 
    $db_table = "users";


    $con = new mysqli($db_host, $db_user, $db_password, $db_base);

 
    if ($con->connect_error) {
        die("Ошибка подключения: " . $con->connect_error);
    }

 
    $con->set_charset("utf8");

    
    $query = $con->prepare("SELECT pasword, role_id FROM $db_table WHERE user = ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($hashed_password_from_db, $role_id);
    $query->fetch();
    $query->close();

  
    if ($hashed_password_from_db && password_verify($pasword, $hashed_password_from_db)) {
      
        if ($role_id == 2) { 
            echo "Добро пожаловать, администратор!";
            header('Location: https://cinema-chaika/backend/admin/admin_panel.php');
        }

       
        $_SESSION['user'] = $user;
        $_SESSION['role_id'] = $role_id;

        
        exit();
    } else {
   
        echo 'Неправильный логин или пароль';
    }

    $con->close();
}
?>
</body>
</html>