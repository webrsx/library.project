<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    public function __construct(
        private ManagerRegistry $doctrine
    )
    {
        $this->authorRepository = $doctrine->getRepository(Author::class);
    }
    #[Route('/author/createAuthor', name: 'author_createAuthor')]

    public function createAuthor()
    {
        $author = new Author();
        $author->setFirstName('Ignat');
        $author->setLastName('Ignatenko');
        $author->setMiddleName('Ignatovich');
        $author->setIdPublishedBooks('4');
        $author->setCountPublishedBooks('2');

        $this->authorRepository->saveAuthor($author, true);

        return new Response('id registered Author: '. $author->getId());
    }

    #[Route('/author/deleteAuthor/{id}', name: 'author_deleteAuthor')]

    public function deleteAuthor($id)
    {
        $author = $this->authorRepository->getAuthor($id);
        $this->authorRepository->removeAuthor($author, true);
        return new Response('the author has been removed');
    }


    #[Route('/author/getAuthor/{id}', name: 'getAuthorInfo')]
    public function getAuthorInfo($id)
    {
        $author = $this->authorRepository->getAuthor($id);

        return new Response('first name author : '. $author->getFirstName());
    }

    #[Route('/author/getAuthorByCountBooks/{countBooks}', name: 'getByCountBooks')]

    public function getByCountBooks(string $countBooks)
    {
        $authorsCollection = $this->authorRepository->getAuthorByCountBooks($countBooks);
        return new Response(print_r($authorsCollection));
    }

}
