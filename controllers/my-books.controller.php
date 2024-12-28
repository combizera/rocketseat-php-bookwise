<?php

use models\Book;

if(! auth()) {
    header('Location: /login');
    exit();
}

$books = $database
    ->query(
        "SELECT * FROM books WHERE user_id = :user_id",
        Book::class,
        params: ['user_id' => auth()->id])
    ->fetchAll();

view('my-books', compact('books'));