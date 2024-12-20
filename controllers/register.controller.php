<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
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