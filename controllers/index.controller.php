<?php

$db = new DB();
$books = $db->books($_REQUEST['search'] ?? null);

view('index', compact('books'));