<?php

namespace App\Book;

class Book 
{
    public function __construct(
        private int $id,
        private int $authorId,
        private string $name,
        private string $discription,
        private $datePublication,
        private string $bookCoverImg
    )
    {    }
}
