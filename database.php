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
    public function books($search = ''): array
    {
        $prepare = $this->db->prepare("SELECT * FROM books WHERE title LIKE :search");
        $prepare->bindValue(':search', "%$search%");
        $prepare->setFetchMode(PDO::FETCH_CLASS, Book::class);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function book($id): Book
    {
        $prepare = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $prepare->bindValue(':id', $id);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Book::class);
        $prepare->execute();

        return $prepare->fetch();
    }
}
