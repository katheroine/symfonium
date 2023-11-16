<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Post;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'index_posts')]
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    #[Route('/post', name: 'create_post')]
    public function createPost(EntityManagerInterface $entityManager): Response
    {
        $post = new Post();
        $post->setTitle('Welcome');
        $post->setContent("Hi, there!");
        $post->setAuthor('Katheroine');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($post);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new post with id ' . $post->getId());
    }
}
