<?php

require 'Validation.php';
use models\User;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $validation = Validation::validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ], $_POST);

    if($validation->fails('login')) {
        header('location: /login');
        exit();
    }

    $user = $database
        ->query("
            SELECT * 
            FROM users 
            WHERE email = :email
            AND password = :password",
        User::class,
        compact('email', 'password'))
        ->fetch();

    if($user) {
        $_SESSION['auth'] = $user;
        flash()->push('message', 'Welcome back, ' . $user->name . '!');
        header('location: /');
        exit();
    }
}

view('login');