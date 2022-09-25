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
    // #[Route('/book', name: 'app_book')]
    // public function index(): Response
    // {
    //     return $this->render('book/index.html.twig', [
    //         'controller_name' => 'BookController',
    //     ]);
    // }

     #[Route('/book/createbook', name: 'createBook')]

    public function createBook(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        $book->setAuthorId(11);
        $book->setName('knijencuiaEdit');
        $book->setDiscription('zdes doljno bilo bit opisanie3');
        $book->setDatePublication(new DateTime("2022-09-01"));
        $book->setBookCoverImg("img/testsrc/1234.jpg");

        // сообщите Doctrine, что вы хотите (в итоге) сохранить Продукт (пока без запросов)
        $entityManager->persist($book);

        // действительно выполните запросы (например, запрос INSERT)
        $entityManager->flush();

        return new Response('Saved new product with id '. $book->getId());
    }


    #[Route('book/showbook/{id}', name: 'showBook')]
    public function showBook(int $id = 2): Response
    {
        $book = $this->getDoctrine()
            ->getRepository(Book::class)
            ->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$book->getName());

        // или отобразить шаблон
        // в шаблоне, печатайте все с {{ product.name }}
        // вернет $this->render('product/show.html.twig', ['product' => $product]);
    }

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
