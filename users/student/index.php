<?php
    include_once '../../conn.php';

    session_start();

    if (!isset($_SESSION['student_name'])) {
        $_SESSION['msg'] = "Сначала вы должны войти в систему";
        header('location: ../../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Привет <?php echo $_SESSION['student_name']; ?>!</h1>
    <a href="logout.php" class="text-decoration-none">Выйти</a>
</body>
</html>