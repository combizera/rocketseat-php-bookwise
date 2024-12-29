<?php

use models\Review;

$id = $_REQUEST['id'];

$book = \models\Book::get($id);

$reviews = $database
    ->query
    (
        'SELECT * FROM reviews WHERE book_id = :id',
        Review::class,
        ['id' => $_GET['id']]
    )
    ->fetchAll();

view('book', compact('book', 'reviews'));
