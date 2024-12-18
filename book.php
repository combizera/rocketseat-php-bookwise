<?php

global $books;

$id = $_REQUEST['id'];
$filteredBook = array_filter($books, function ($book) use ($id) {
    return $book['id'] == $id;
});
$book = array_pop($filteredBook);

$view = 'book';

require 'views/components/head.php';
