<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\BookRepository;
use App\Entity\Book;
use OpenApi\Annotations\Response;
use Symfony\Component\HttpFoundation\Request;



class BookController extends AbstractController
{ 
    public function __construct(
        private BookRepository $bookRepository
    )
    {}


    #[Route('/book/createbook', name: 'book_createBook', methods: ['POST'])]

    public function createBook(Request $request)
    {
        $book = new Book();
        $book->setAuthorId($request->request->get('authorId'));
        $book->setName($request->request->get('name'));
        $book->setDiscription($request->request->get('description'));
        $book->setDatePublication($request->request->get('datePublication'));
        $book->setBookCoverImg($request->request->get('bookCoverImg'));

        $this->bookRepository->saveBook($book, true);

        return new JsonResponse(['Created new book with id:' => $book->getId()]);
    }


    #[Route('/book/remove/{id}', name: 'book_removeBook', methods: ['DELETE'])]

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
            'bookCoverImg' => $book->getBookCoverImg()  
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
