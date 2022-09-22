<?php

namespace App\Author;

class Author
{
    public function __construct(
        private int $id,
        private string $firstName,
        private string $lastName,
        private string $middleName,
        private int $idPublishedBooks,
        private int $countPublishedBooks
    )
    {    }
    
    public function getFirstName()
    {
        return $this->firstname;
    }
}