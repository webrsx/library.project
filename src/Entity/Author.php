<?php

namespace App\Entity;

use Doctrine\Persistence\ManagerRegistry;
use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $middleName = null;

    #[ORM\Column]
    private ?int $idPublishedBooks = null;

    #[ORM\Column]
    private ?int $countPublishedBooks = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): self
    {
        $this->middleName = $middleName;

        return $this;
    }

    public function getIdPublishedBooks(): ?int
    {
        return $this->idPublishedBooks;
    }

    public function setIdPublishedBooks(int $idPublishedBooks): self
    {
        $this->idPublishedBooks = $idPublishedBooks;

        return $this;
    }

    public function getCountPublishedBooks(): ?int
    {
        return $this->countPublishedBooks;
    }

    public function setCountPublishedBooks(int $countPublishedBooks): self
    {
        $this->countPublishedBooks = $countPublishedBooks;

        return $this;
    }
}
