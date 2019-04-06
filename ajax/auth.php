<?php

$login    = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass     = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($login) <= 3){
    $error = 'Введите login';
} elseif (strlen($pass) <= 3){
    $error = 'Введите пароль';
}

if (!empty($error)){
    die($error);
}


try {
/*    $dbname = 'testing';
    $host = 'localhost';
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
*/

    require_once __DIR__ . '/../mysql_connect.php';

    $data = [];
    $data[':login'] = $login;

    $sql = 'SELECT pass FROM users WHERE login=:login';
    $sth = $dbh->prepare($sql);
    $res = $sth->execute($data);
    $user = $sth->fetch(PDO::FETCH_OBJ);

} catch (Exception $e) {
    die($e->getMessage());
}

if (!password_verify($pass, $user->pass)){
//    echo $pass . ' == ' .  $user->pass;
    echo 'Пользователь не найден';
} else {
    setcookie('login', $login, time() + 36000, '/');
    echo 'Готово';
}



















