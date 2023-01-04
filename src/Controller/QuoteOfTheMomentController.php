<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class QuoteOfTheMomentController
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

    public function index(): Response
    {
        $index = random_int(0, sizeof(self::QUOTES) - 1);
        $quote = self::QUOTES[$index]['latin'];

        $response = new Response($quote);

        return $response;
    }
}