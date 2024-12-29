<?php

$search = $_REQUEST['search'] ?? '';

$books = \models\Book::all($search);

view('index', compact('books'));