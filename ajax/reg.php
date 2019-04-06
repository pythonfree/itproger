<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email    = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login    = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass     = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($username) <= 3){
    $error = 'Введите имя';
} elseif (strlen($email) <= 3){
    $error = 'Введите email';
} elseif (strlen($login) <= 3){
    $error = 'Введите login';
} elseif (strlen($pass) <= 3){
    $error = 'Введите пароль';
}

if (!empty($error)){
    die($error);
}

$pass = password_hash($pass, PASSWORD_DEFAULT);


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
    $data[':name'] = $username;
    $data[':email'] = $email;
    $data[':login'] = $login;
    $data[':pass'] = $pass;

    $sql = 'INSERT INTO users (name, email, login, pass) VALUES ('
        . implode(',', array_keys($data))
        . ');';
    $sth = $dbh->prepare($sql);
    $res = $sth->execute($data);

    $id = $dbh->lastInsertId();
} catch (Exception $e) {
    die($e->getMessage());
}

echo 'Готово';



















