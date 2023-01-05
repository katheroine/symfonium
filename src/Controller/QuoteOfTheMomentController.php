<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuoteOfTheMomentController extends AbstractController
{
    private const QUOTES = [
        [
            'latin' => 'Veni, vidi, vici.',
            'english' => 'I came, I saw, I conquered.',
            'author' => 'Julius Cezar',
        ],
        [
            'latin' => 'Alea iacta est.',
            'english' => 'The die has been cast.',
            'author' => 'Julius Cezar',
        ],
        [
            'latin' => 'Carpe diem.',
            'english' => 'Seize the day.',
            'author' => '',
        ],
        [
            'latin' => 'Cogito, ergo sum.',
            'english' => 'I think, therefore I am.',
            'author' => 'René Descartes',
        ],
        [
            'latin' => 'In vino veritas.',
            'english' => 'In wine, there is truth.',
            'author' => '',
        ]
    ];

    public function index()
    {
        $index = random_int(0, sizeof(self::QUOTES) - 1);
        $quote = self::QUOTES[$index];

        return $this->render('quote_of_the_moment.html.twig', [
            'quote' => $quote,
        ]);
    }
}