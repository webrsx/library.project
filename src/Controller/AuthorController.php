<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends AbstractController
{
    public function __construct(
        private AuthorRepository $authorRepository
    )
    {}

    #[Route('/author/createAuthor', name: 'author_createAuthor', methods: ['POST'])]

    public function createAuthor(Request $request)
    {
        $author = new Author();
        $author->setFirstName($request->request->get('firstName'));
        $author->setLastName($request->request->get('lastName'));
        $author->setMiddleName($request->request->get('middleName'));
        $author->setIdPublishedBooks($request->request->get('idPublishedBooks'));
        $author->setCountPublishedBooks($request->request->get('countPublishedBooks'));

        $this->authorRepository->saveAuthor($author, true);

        return new Response('id registered Author: '. $author->getId());
    }

    #[Route('/author/delete/{id}', name: 'author_deleteAuthor', methods: ['DELETE'])]

    public function deleteAuthor($id)
    {
        $author = $this->authorRepository->getAuthor($id);
        $this->authorRepository->removeAuthor($author, true);
        return new Response('the author has been removed');
    }


    #[Route('/author/get/{id}', name: 'getAuthorInfo', methods: ['GET'])]
    public function getAuthorInfo(int $id)
    {
        $author = $this->authorRepository->getAuthor($id);

        return new Response('first name author : '. $author->getFirstName());
    }

    #[Route('/author/getByCountBooks/{countBooks}', name: 'getByCountBooks', methods: ['GET'])]

    public function getByCountBooks(int $countBooks)
    {
        $authorsCollection = $this->authorRepository->getAuthorByCountBooks($countBooks);
        return new JsonResponse([$authorsCollection]);
    }
    #[Route('/author', name: 'moreThenOneBook', methods: ['GET'])]
    public function MoreThanOneBook(){
        $authors = $this->authorRepository->getAuthorsWhereMoreThanOneBook();
        $prepareToJsonResponse = [];
        
        foreach($authors as $author){
            $prepareToJsonResponse[] = [
                'id' => $author->getId(),
                'firstName' => $author->getFirstName(),
                'lastName' => $author->getLastName(),
                'middleName' => $author->getMiddleName(),
                'idPublishedBooks' => $author->getIdPublishedBooks(),
                'countPublishedBooks' => $author->getCountPublishedBooks()
            ];
        }
        
        return new JsonResponse($prepareToJsonResponse);
    }       
}
