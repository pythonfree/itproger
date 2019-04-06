<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email    = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess     = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($username) <= 3){
    $error = 'Введите имя';
} elseif (strlen($email) <= 3){
    $error = 'Введите email';
} elseif (strlen($mess) <= 3){
    $error = 'Введите сообщение';
}

if (!empty($error)){
    die($error);
}


//письмо админу сайта
$message = "Текст сообщения: $mess";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$subject = "From $username email: $email";
mail('79115839983@ya.ru', $subject, $message, $headers);
