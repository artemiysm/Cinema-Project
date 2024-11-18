<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    function regUser($mysqli, $login, $password)
    {
        $pass = password_hash($pasword,PASSWORD_BCRYPT);
        $hash = $pass;
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        $query = $db->prepare("INSERT INTO $db_table (user, pasword) VALUES(?,?, NOW())";
        $stmt = $mysqli->prepare($sql); 
        $stmt->bind_param("sss", $login, $password, $mail);
        $stmt->execute();
    }
?>
</body>
</html>