<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController
{
  #[Route('/blog/', name: 'blog_posts')]
  public function posts(): Response
  {
    return new Response("<h1>Hello, there!</h1>");
  }

  public function postCategories(): Response
  {
    return new Response("<h1>Hi, there!</h1>");
  }
}
