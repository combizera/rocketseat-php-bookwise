<?php

use models\Review;

$id = $_REQUEST['id'];

$book = $database
    ->query
    (
        'SELECT * FROM books WHERE id = :id',
        \models\Book::class,
        [':id' => $id]
    )
    ->fetch();

$reviews = $database
    ->query
    (
        'SELECT * FROM reviews WHERE book_id = :id',
        Review::class,
        ['id' => $_GET['id']]
    )
    ->fetchAll();

view('book', compact('book', 'reviews'));
