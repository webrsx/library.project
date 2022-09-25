<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\Date;

class BookController extends AbstractController
{
    // #[Route('/book', name: 'app_book')]
    // public function index(): Response
    // {
    //     return $this->render('book/index.html.twig', [
    //         'controller_name' => 'BookController',
    //     ]);
    // }

     #[Route('/book', name: 'createBook')]

    public function createBook(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        $book->setAuthorId(12);
        $book->setName('Grokaem algoritmy');
        $book->setDiscription('zdes doljno bilo bit opisanie');
        $book->setDatePublication(new DateTime("2022-09-01"));
        $book->setBookCoverImg("img/testsrc/123.jpg");

        // сообщите Doctrine, что вы хотите (в итоге) сохранить Продукт (пока без запросов)
        $entityManager->persist($book);

        // действительно выполните запросы (например, запрос INSERT)
        $entityManager->flush();

        return new Response('Saved new product with id '.$book->getId());
    }

}
