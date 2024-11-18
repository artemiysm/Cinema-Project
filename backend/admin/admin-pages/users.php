<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление пользователями и ролями</title>
    <link rel="stylesheet" href="/backend/admin/style/user-style.css">
</head>
<body>

<h2>Управление пользователями и их ролями</h2>
<p><a href="../admin_panel.php">Вернуться назад</a></p>
<?php

$db_host = "127.127.126.26"; 
$db_user = "root"; 
$db_password = "^ruS7]u56^£L"; 
$db_base = 'kino';


$con = new mysqli($db_host, $db_user, $db_password, $db_base);


if ($con->connect_error) {
    die("Ошибка подключения: " . $con->connect_error);
}


$con->set_charset("utf8");


if (isset($_POST['user_id']) && isset($_POST['role_id'])) {
    $user_id = (int)$_POST['user_id'];
    $role_id = (int)$_POST['role_id'];

    
    $update_query = $con->prepare("UPDATE users SET role_id = ? WHERE id = ?");
    $update_query->bind_param("ii", $role_id, $user_id);

    if ($update_query->execute()) {
        echo "<p style='text-align:center; color: green;'>Роль пользователя обновлена.</p>";
    } else {
        echo "<p style='text-align:center; color: red;'>Ошибка обновления роли: " . $update_query->error . "</p>";
    }

    $update_query->close();
}

// список всех пользователей и их ролей
$sql_users = "
    SELECT users.id, users.user, roles.role_name AS role_name, roles.id AS role_id
    FROM users
    LEFT JOIN roles ON users.role_id = roles.id
";
$result_users = $con->query($sql_users);

// список всех ролей
$sql_roles = "SELECT id, role_name FROM roles";
$result_roles = $con->query($sql_roles);
$roles = [];
while ($role = $result_roles->fetch_assoc()) {
    $roles[] = $role;
}

//  список пользователей
if ($result_users->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Current Role</th><th>Change Role</th></tr>";

    while ($user = $result_users->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['id']) . "</td>";
        echo "<td>" . htmlspecialchars($user['user']) . "</td>";
        echo "<td>" . htmlspecialchars($user['role_name']) . "</td>";
        
        //  изменение роли
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='user_id' value='" . $user['id'] . "'>";
        echo "<select name='role_id' onchange='this.form.submit()'>";
        
        foreach ($roles as $role) {
            $selected = ($role['id'] == $user['role_id']) ? "selected" : "";
            echo "<option value='" . $role['id'] . "' $selected>" . htmlspecialchars($role['role_name']) . "</option>";
        }
        
        echo "</select>";
        echo "</form>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p style='text-align:center;'>Нет пользователей для отображения.</p>";
}


$con->close();
?>

</body>
</html>