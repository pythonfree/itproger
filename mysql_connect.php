<?php

    $dbname = 'testing';
    $host = 'localhost';
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
