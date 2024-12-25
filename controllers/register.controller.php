<?php

require 'Validation.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validation = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed'],
        //'password' => ['required', 'min:8', 'max:16', 'strong']
    ], $_POST);

    if($validation->fails()) {
        $_SESSION['validation'] = $validation->errors();
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