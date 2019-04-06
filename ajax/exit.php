<?php
    setcookie('login', $_COOKIE['login'], time() - 100000, '/');
    unset($_COOKIE['login']);
    echo true;




















