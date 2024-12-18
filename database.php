<?php

class BD
{
    /**
     * @return array[Book]
     */
    public function books(): array
    {
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query('SELECT * FROM books');
        $items = $query->fetchAll();
        $return = [];

        foreach ($items as $item) {
            $book = new Book;
            $book->id = $item['id'];
            $book->title = $item['title'];
            $book->author = $item['author'];
            $book->description = $item['description'];
            $return[]= $book;
        }
        return $return;
    }
}
