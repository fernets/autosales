<!doctype html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
<link type="text/css" rel="stylesheet" href="../css/reset.css" media="all" />
<link type="text/css" rel="stylesheet" href="../css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="../css/media.css" media="all" />
</head>
<body>


<?php   
    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    
    $mysql = new mysqli('webhosting.apeps.pp.ua:3306', 'c51_autosales', 'Chm@w92sUUERe', 'c51_autosales');


    if ($mysql->connect_error) {
        echo "Нет подключения к БД. Ошибка:".mysqli_connect_error();
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Неправильно введена пошта";
    } else {
        echo "Форма успішно відправлена";
        $mysql->query("INSERT INTO `Users` (`name`, `phone_num`, `email`) VALUES('$name', '$phone', '$email')");
    }

    echo ' ';
    
    $mysql->close();
    header('Refresh: 5; url=../index.html');

?>