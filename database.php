<?php

class BD {
    public function books(): array
    {
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query('SELECT * FROM books');
        return $query->fetchAll();
    }
}
