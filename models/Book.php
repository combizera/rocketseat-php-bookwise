<?php

namespace models;

class Book
{
    public $id;
    public $user_id;
    public $title;
    public $author;
    public $description;
    public $year;
    public $rating;
    public $reviews;
    public $image;

    public function query($where, $params)
    {
        $database = new \Database(config('database'));

        return $database
            ->query
            (
                "
                select
                b.id, b.title, b.author, b.description, b.year, b.image,
                ifnull(round(sum(r.rating) / 5), 0) as rating,
                ifnull(count(r.id), 0) as reviews
                from books b
                left join reviews r on r.book_id = b.id
                where $where
                group by b.id, b.title, b.author, b.description, b.year, b.image
                ",
                self::class,
                params: $params
            );
    }

    public static function get($id)
    {
        return (new self)
            ->query('b.id = :id', ['id' => $id])
            ->fetch();
    }

    public static function all($filter = '')
    {
        return (new self)
            ->query('title like :filter', ['filter' => "%$filter%"])
            ->fetchAll();
    }

    public static function myBooks($user_id)
    {
        return (new self)
            ->query('b.user_id = :user_id', ['user_id' => $user_id])
            ->fetchAll();
    }
}