<?php

require 'Validation.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: /my-books');
    exit;
}

if(!auth()) {
    abort(403);
}

$user_id = auth()->id;
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$year = $_POST['year'];

$validation = Validation::validate([
    'title' => ['required', 'min:3'],
    'author' => ['required'],
    'description' => ['required'],
    'year' => ['required']
], $_POST);

if($validation->fails('validations'))
{
    header('location: /my-books');
    exit();
}

$database->query("
    INSERT INTO books (user_id, title, author, description, year)
    VALUES (:user_id, :title, :author, :description, :year)
", params: compact('user_id', 'title', 'author', 'description', 'year'));

flash()->push('message', 'Book added successfully!');
header('Location: /my-books');
exit();