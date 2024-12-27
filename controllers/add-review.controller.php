<?php

require 'Validation.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: /');
    exit;
}

$user_id = auth()->id;
$book_id = $_POST['book_id'];
$review = $_POST['review'];
$rating = $_POST['rating'];

$validation = Validation::validate([
    'review' => ['required'],
    'rating' => ['required']
], $_POST);

if($validation->fails('validations'))
{
    header('location: /book?id=' . $book_id);
    exit();
}

$database->query("
    INSERT INTO reviews (book_id, user_id, review, rating)
    VALUES (:book_id, :user_id, :review, :rating)
", params: compact('book_id', 'user_id', 'review', 'rating'));

flash()->push('message', 'Review added successfully!');
header('Location: /book?id=' . $book_id);
exit();