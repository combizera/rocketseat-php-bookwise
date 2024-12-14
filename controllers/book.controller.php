<?php

global $books;

//MODEL
require 'data.php';

$id = $_REQUEST['id'];

$filteredBook = array_filter($books, function ($book) use ($id) {
    return $book['id'] == $id;
});
$book = array_pop($filteredBook);

view('book', compact('book'));
