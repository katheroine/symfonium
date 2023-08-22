<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController
{
  #[Route('/blog/')]
  public function posts(): Response
  {
    return new Response("<h1>Hello, there!</h1>");
  }
}
