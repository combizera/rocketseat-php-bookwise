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

    public static function get($id)
    {
        $database = new \Database(config('database'));

        return $database
            ->query
            (
                '
                select
                b.id, b.title, b.author, b.description, b.year,
                round(sum(r.rating) / 5) as rating,
                count(r.id) as reviews
                from books b
                left join reviews r on r.book_id = b.id
                where b.id = :id
                group by b.id, b.title, b.author, b.description, b.year
                ',
                self::class,
                compact('id')
            )
            ->fetch();
    }

    public static function all()
    {
        return Book::all();
    }

    public static function my($user_id)
    {
        $database = new \Database(config('database'));

        return $database
            ->query(
                "SELECT * FROM books WHERE user_id = :user_id",
                self::class,
                params: compact('user_id')
            ->fetchAll();
    }
}