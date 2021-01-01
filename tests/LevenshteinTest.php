<?php

use PHPUnit\Framework\TestCase;

final class LevenshteinTest extends TestCase
{
    public function testDistanceCalcWithoutSpace()
    {
        $levenshtein = new \App\Levenshtein();
        $this->assertEquals(4, $levenshtein->distanceCalc("chien", "niche"));
    }

    public function testDistanceCalcWithSpace()
    {
        $levenshtein = new \App\Levenshtein();
        $this->assertEquals(4, $levenshtein->distanceCalc("chien ", " niche "));
    }
}