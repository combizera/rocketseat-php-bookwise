<?php

use models\Book;

if(! auth()) {
    header('Location: /login');
    exit();
}

$books = Book::myBooks(auth()->id);

view('my-books', compact('books'));