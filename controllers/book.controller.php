<?php

$id = $_REQUEST['id'];

$book = $database
    ->query
    (
        'SELECT * FROM books WHERE id = :id',
        \models\Book::class,
        [':id' => $id]
    )
    ->fetch();

view('book', compact('book'));
