<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Data\Posts;

#[Route('/api', name: 'api_')]
class ApiBlogController extends AbstractController
{
    #[Route('/posts', name: 'index_posts', methods:['get'] )]
    public function index(): Response
    {
        return $this->json(Posts::getAll(), 200, ["Content-Type" => "application/json"]);
    }

    #[Route('/posts/{id}', name: 'show_post', methods:['get'] )]
    public function show($id): Response
    {
        return $this->json(Posts::get($id), 200, ["Content-Type" => "application/json"]);
    }
}
