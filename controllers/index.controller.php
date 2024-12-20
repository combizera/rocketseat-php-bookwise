<?php

$search = $_REQUEST['search'] ?? '';

$books = $database
    ->query
    (
        "SELECT * FROM books WHERE title LIKE :search",
        \models\Book::class,
        [':search' => "%$search%"]
    )
    ->fetchAll();

view('index', compact('books'));