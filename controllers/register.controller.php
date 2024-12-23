<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation = [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_confirm = $_POST['email_confirm'];
    $password = $_POST['password'];

    if(strlen($name) == 0) {
        $validation []= 'Name is required';
    }

    if(strlen($email) == 0) {
        $validation []= 'Email is required';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation []= 'Email is invalid';
    }

    if($email != $email_confirm) {
        $validation []= 'Emails do not match';
    }

    if(strlen($password) == 0) {
        $validation []= 'Password is required';
    }

    if(strlen($password) < 8 || strlen($password) > 30) {
        $validation []= 'Password must be between 8 and 30 characters';
    }

    if(! str_contains($password, '*')) {
        $validation []= 'Password must contain *';
    }

    if(sizeof($validation) > 0) {
        $_SESSION['validation'] = $validation;
        header('location: /login');
        exit();
    }

   $database->query(
       'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',
       params: [
           ':name' => $_POST['name'],
           ':email' => $_POST['email'],
           ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
       ]
   );

   header('location: /login?message=Registered successfully');
   exit();
}

view('login');