<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GreetingsController
{
    #[Route('/hello/{inside}')]
    public function hello(string $inside = ""): Response
    {
        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../styles.css">
            </head>
            <body>
            <main>
            <h1>Hello, ' . ($inside ? ucfirst($inside) : 'there') . '!</h1>
            </main>
            </body>
            </html>';

        return new Response($content);
    }

    #[Route('/welcome/{inside?friend}')]
    public function welcome(string $inside): Response
    {
        $content = '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="../styles.css">
            </head>
            <body>
            <main>
            <h1>Welcome, ' . ucfirst($inside) . '!</h1>
            </main>
            </body>
            </html>';

        return new Response($content);
    }
}
