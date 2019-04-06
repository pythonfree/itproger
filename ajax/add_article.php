<?php

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text  = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($title) <= 10){
    $error = 'Введите название статьи';
} elseif (strlen($intro) <= 20){
    $error = 'Введите интро статьи';
} elseif (strlen($text) <= 30){
    $error = 'Введите текст статьи';
}

if (!empty($error)){
    die($error);
}


try {

    require_once __DIR__ . '/../mysql_connect.php';

    $data = [];
    $data[':title'] = $title;
    $data[':intro'] = $intro;
    $data[':atext'] = $text;
    $data[':adate'] = time();
    $data[':avtor'] = $_COOKIE['login'];

    $sql = 'INSERT INTO articles (title, intro, atext, adate, avtor) VALUES ('
        . implode(',', array_keys($data))
        . ');';
    $sth = $dbh->prepare($sql);
    $res = $sth->execute($data);

    $id = $dbh->lastInsertId();
} catch (Exception $e) {
    die($e->getMessage());
}

echo 'Готово';



















