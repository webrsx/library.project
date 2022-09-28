<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



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
            'bookCoverImg' => $book->getBookCoverImg()     
        ]);
    }

    #[Route('/book/getall/', name: 'getAllBooks', methods: ['GET'])]
    public function getAllBooks()
    {
        header("Access-Control-Allow-Origin: *");
        $books = $this->bookRepository->getAllBooks();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $booker = null;
        foreach($books as $book){
            $booker .= $serializer->serialize($book, 'json');
        }

        $response = new Response($booker, 'Access-Control-Allow-Origin: *');   

    }

}
