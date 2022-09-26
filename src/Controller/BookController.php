<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;


class BookController extends AbstractController
{ 
    public function __construct(
       private ManagerRegistry $doctrine
    )
    {
        $this->bookRepository = $doctrine->getRepository(Book::class);
    }


    #[Route('/book/createbook', name: 'book_createBook')]

    public function createBook(): Response
    {
        $book = new Book();
        $book->setAuthorId(16);
        $book->setName('newTest');
        $book->setDiscription('zdes doljno bilo bit opisanie3');
        $book->setDatePublication(new DateTime("2022-09-01"));
        $book->setBookCoverImg("img/testsrc/1234.jpg");

        $this->bookRepository->saveBook($book, true);

        return new Response('Saved new product with id:  '. $book->getId());
    }


    #[Route('/book/remove/{id}', name: 'book_removeBook')]

    function removeBook($id)
    {
        $book = $this->bookRepository->getBook($id);
        $this->bookRepository->removeBook($book, true);

        return new Response('delete completed');
    }

    
    #[Route('book/get/{id}', name: 'getBook')]

    public function getBook(int $id = 2): Response
    {
        $book = $this->bookRepository->getBook($id, true);

        return new Response('Book name: '.$book->getName(). '. and ID: ' .$book->getID());

        // или отобразить шаблон
        // в шаблоне, печатайте все с {{ product.name }}
        // вернет $this->render('product/show.html.twig', ['product' => $product]);
    }

    // #[Route('book/getinfo', name: 'getInfo')]
    // public function getInfo(ManagerRegistry $doctrine): Response
    // {
    //     $repository = $doctrine->getRepository(Book::class);
    //     $book = new Book();
    //     $book->setAuthorId(11);
    //     $book->setName('knijencuiaEdit');
    //     $book->setDiscription('zdes doljno bilo bit opisanie3');
    //     $book->setDatePublication(new DateTime("2022-09-01"));
    //     $book->setBookCoverImg("img/testsrc/1234.jpg");
    //     return new Response($repository->getInfo($book, true));
    // }

    // #[Route('book/experiment/{id}', name: 'experiment')]
    // public function experiment(int $id, ManagerRegistry $doctrine)
    // {
    //     $book = $this->getDoctrine()
    //         ->getRepository(Book::class)
    //         ->find($id);
    //     $oldValueBookName = $book->getName();
    //     $book->setName('kniga new edit');
    //     $entityManager = $doctrine->getManager();
    //     $entityManager->persist($book);
    //     $entityManager->flush();
        

    //     return new Response('old value name: '. $oldValueBookName);
    // }
}
