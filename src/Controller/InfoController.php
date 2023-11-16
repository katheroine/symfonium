<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class InfoController
{
    #[Route('/info')]
    public function index(): Response
    {
        phpinfo();

        return new Response("");
    }
}
