<?php

require '../Validation.php';

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
    'year' => ['required'],
], $_POST);

if($validation->fails('validations'))
{
    header('location: /my-books');
    exit();
}

$newName = md5(rand());
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$image = "images/$newName.$extension";

move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../public/' . $image);

$database->query("
    INSERT INTO books (user_id, title, author, description, year, image)
    VALUES (:user_id, :title, :author, :description, :year, :image)
", params: compact('user_id', 'title', 'author', 'description', 'year', 'image'));

flash()->push('message', 'Book added successfully!');
header('Location: /my-books');
exit();