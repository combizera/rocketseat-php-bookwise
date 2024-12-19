<?php

use models\Book;

class DB
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:database.sqlite');
    }

    /**
     * @return array[Book]
     */
    public function books($id = null): array
    {
        $query = $this->db->query('SELECT * FROM books');

        $items = $query->fetchAll();

        return array_map(fn($item) => Book::make($item), $items);
    }

    public function book($id)
    {
        $sql = 'SELECT * FROM books';
        $sql .= ' WHERE id = ' . $id;

        $query = $this->db->query($sql);
        $items = $query->fetchAll();

        return array_map(fn($item) => Book::make($item), $items)[0];
    }
}
