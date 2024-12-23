<?php

use models\Book;

class Database
{
    private $db;

    public function __construct($config)
    {
        $this->db = new PDO($this->getDsn($config));
    }

    private function getDsn($config): string
    {
        $driver = $config['driver'];
        unset($config['driver']);

        $dsn = $driver . ':' .  http_build_query($config, '', ';');

        if($driver == 'sqlite')
        {
            $dsn = $config['driver'] . ':' . $config['database'];
        }

        return $dsn;
    }

    public function query($query, $class = null, $params = []): PDOStatement
    {
        $prepare = $this->db->prepare($query);

        if($class)
        {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
    }
}

$database = new Database($config['database']);
