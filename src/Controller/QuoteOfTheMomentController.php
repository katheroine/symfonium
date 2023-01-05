<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Data\Quotes;

class QuoteOfTheMomentController extends AbstractController
{
    public function index()
    {
        return $this->render('quote_of_the_moment.html.twig', [
            'quote' => Quotes::draw(),
        ]);
    }
}