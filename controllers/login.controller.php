<?php

$message = $_REQUEST['message'] ?? '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $user = $database
        ->query("
            SELECT * 
            FROM users 
            WHERE email = :email
            AND password = :password",
        params: compact('email', 'password'))
        ->fetch();

    if($user) {
        $_SESSION['auth'] = $user;
        $_SESSION['message'] = 'Welcome back, ' . $user['name'] . '!';
        header('location: /');
        exit();
    }
}

view('login', compact('message'));