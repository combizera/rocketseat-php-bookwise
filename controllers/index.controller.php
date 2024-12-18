<?php

$db = new BD();
$books = $db->books();

view('index', compact('books'));