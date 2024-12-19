<?php

global $books;

$id = $_REQUEST['id'];

$db = new DB();
$book = $db->book($id);

view('book', compact('book'));
