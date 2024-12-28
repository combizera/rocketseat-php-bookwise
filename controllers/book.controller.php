<?php

use models\Review;

$id = $_REQUEST['id'];

$book = $database
    ->query
    (
        '
                select
                b.id, b.title, b.author, b.description, b.year,
                round(sum(r.rating) / 5) as rating,
                count(r.id) as reviews
                from books b
                left join reviews r on r.book_id = b.id
                where b.id = :id
                group by b.id, b.title, b.author, b.description, b.year
                ',
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
