<?php

namespace App\Data;

use PHPUnit\Framework\TestCase;

class QuotesTest extends TestCase
{
    private const PROPER_QUOTE_KEYS = [
        'latin',
        'english',
        'author',
    ];

    public function testQuotesClassExists()
    {
        $this->assertTrue(
            class_exists('App\Data\Quotes')
        );
    }

    public function testGetAllFunctionExists()
    {
        $this->assertTrue(
            method_exists(
                'App\Data\Quotes',
                'getAll'
            )
        );
    }

    public function testGetAllReturnsArray()
    {
        $result = Quotes::getAll();

        $this->assertIsArray($result);
    }

    public function testDrawFunctionExists()
    {
        $this->assertTrue(
            method_exists(
                'App\Data\Quotes',
                'draw'
            )
        );
    }

    public function testDrawReturnsArray()
    {
        $result = Quotes::draw();

        $this->assertIsArray($result);
    }

    public function testDrawReturnsOneQuoteFromAllQuotes()
    {
        $oneQuote = Quotes::draw();
        $allQuotes = Quotes::getAll();

        $this->assertTrue(
            in_array($oneQuote, $allQuotes)
        );
    }

    /**
     * @dataProvider provideQuotes
     */
    public function testEachQuoteNecessaryKeys(array $quote)
    {
        foreach (self::PROPER_QUOTE_KEYS as $key) {
            $this->assertArrayHasKey($key, $quote);
        }
    }

    /**
     * @dataProvider provideQuotes
     */
    public function testEachQuoteHasNotUnecessaryKeys(array $quote)
    {
        foreach (array_keys($quote) as $key) {
            $this->assertContains($key, self::PROPER_QUOTE_KEYS);
        }
    }

    public function provideQuotes()
    {
        foreach (Quotes::getAll() as $quote) {
            yield [$quote];
        }
    }
}
