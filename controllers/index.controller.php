<?php

$search = $_REQUEST['search'] ?? '';

$db = new DB();

$books = $db
    ->query
    (
        "SELECT * FROM books WHERE title LIKE :search",
        \models\Book::class,
        [':search' => "%$search%"]
    )
    ->fetchAll();

view('index', compact('books'));