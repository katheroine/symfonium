<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/api', name: 'api_')]
class ApiBlogController extends AbstractController
{
    public static array $posts = [
        [
            'title' => "Hi, there!",
            'author' => "Kate",
            'date' => "25.08.2023",
            'category_id' => 0,
            'content' => "Welcome to my blog!",
        ],
        [
            'title' => "About me",
            'author' => "Kate",
            'date' => "26.08.2023",
            'category_id' => 0,
            'content' => "My name is Kate and this will be programistic blog.",
        ],
        [
            'title' => "My languages",
            'author' => "Kate",
            'date' => "27.08.2023",
            'category_id' => 1,
            'content' => "My favourite language is C++ but PHP is the one I've got commercial experience.",
        ],
    ];

    #[Route('/posts', name: 'index_posts', methods:['get'] )]
    public function index(): Response
    {
        return $this->json(self::$posts, 200, ["Content-Type" => "application/json"]);
    }

    #[Route('/posts/{id}', name: 'show_post', methods:['get'] )]
    public function show($id): Response
    {
        return $this->json(self::$posts[$id], 200, ["Content-Type" => "application/json"]);
    }
}
