<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;



class BookController extends AbstractController
{ 
    public function __construct(
       private ManagerRegistry $doctrine
    )
    {
        $this->bookRepository = $doctrine->getRepository(Book::class);
    }


    #[Route('/book/createbook', name: 'book_createBook')]

    public function createBook(): JsonResponse
    {
        $book = new Book();
        $book->setAuthorId(16);
        $book->setName('newTest');
        $book->setDiscription('zdes doljno bilo bit opisanie3');
        $book->setDatePublication("2022-09-01");
        $book->setBookCoverImg("img/testsrc/1234.jpg");

        $this->bookRepository->saveBook($book, true);

        return new JsonResponse(['Created new book with id:' => $book->getId()]);
    }


    #[Route('/book/remove/{id}', name: 'book_removeBook')]

    function removeBook($id)
    {
        $book = $this->bookRepository->getBook($id);
        $this->bookRepository->removeBook($book, true);

        return new JsonResponse(['delete completed']);
    }

    
    #[Route('book/get/{id}', name: 'getBook', methods: ['GET'])]

    public function getBook(int $id = 2): JsonResponse
    {
        $book = $this->bookRepository->getBook($id, true);

        return new JsonResponse([
            'id' => $book->getid(),
            'authorId' => $book->getAuthorId(),
            'name' => $book->getName(),
            'desription' => $book->getDiscription(),
            'datePublication' => $book->getDatePublication(),
            'bookCoverImg' => $book->getBookCoverImg(),
            'test' => ['1a' => 1,'2' => 2, '3' => 3]   
        ]);
    }

    #[Route('/book/getall/', name: 'getAllBooks', methods: ['GET'])]
    public function getAllBooks()
    {
        $books = $this->bookRepository->getAllBooks();
        $booksToJsonResponse = [];

        foreach($books as $book){
                $booksToJsonResponse[] = [
                    'id' => $book->getid(),
                    'authorId' => $book->getAuthorId(),
                    'name' => $book->getName(),
                    'desription' => $book->getDiscription(),
                    'datePublication' => $book->getDatePublication(),
                    'bookCoverImg' => $book->getBookCoverImg()
                ];
        }
        
        return new JsonResponse($booksToJsonResponse);

    }

}
