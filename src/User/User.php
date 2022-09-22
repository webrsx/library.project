<?php

namespace App\User;

class User
{
    public function __construct(
        private int $id,
        private string $nickname,
        private string $email
    )
    {    }
}