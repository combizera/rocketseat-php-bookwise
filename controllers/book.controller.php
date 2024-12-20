<?php

$id = $_REQUEST['id'];

$db = new DB();
$book = $db
    ->query
    (
        'SELECT * FROM books WHERE id = :id',
        \models\Book::class,
        [':id' => $id]
    )
    ->fetch();

view('book', compact('book'));
