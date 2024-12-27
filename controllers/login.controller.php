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

    if($validation->fails('login'))
    {
        header('location: /login');
        exit();
    }

    $user = $database
        ->query("
            SELECT * 
            FROM users 
            WHERE email = :email",
        User::class,
        compact('email'))
        ->fetch();

    if($user)
    {
        $passwordPost = $_REQUEST['password'];
        $passwordHash = $user->password;

        if(! password_verify($passwordPost, $passwordHash)) {
            flash()->push('errors_login', ['User not found or password incorrect']);
            header('location: /login');
            exit();
        }

        $_SESSION['auth'] = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
        flash()->push('message', 'Welcome back, ' . $user->name . '!');
        header('location: /');
        exit();
    }
}

view('login');