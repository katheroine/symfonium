<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyNumberController extends AbstractController
{
    #[Route('/drawn-lucky-number')]
    public function drawnNumber(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    #[Route('/personal-lucky-number/{name}')]
    public function personalNumber(string $name): Response
    {
      $keyNumber = strlen($name);
      $number = random_int($keyNumber, 100 + $keyNumber);

      return $this->render('personal_lucky_number.html.twig', ['number' => $number]);
    }
}
