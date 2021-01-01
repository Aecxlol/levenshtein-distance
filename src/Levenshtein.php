<?php


namespace App;


class Levenshtein
{
    public function distanceCalc(string $a, string $b)
    {
        $matrix = array();
        $add = null;

        $a = trim($a);
        $b = trim($b);

        for ($i = 0; $i <= strlen($b); $i++) {
            $matrix[$i][0] = $i;
        }


        for ($j = 0; $j <= strlen($a); $j++) {
            $matrix[0][$j] = $j;
        }

        for ($i = 1; $i <= strlen($b); $i++) {
            for ($j = 1; $j <= strlen($a); $j++) {
                $add = str_split($b)[$i - 1] === str_split($a)[$j - 1] ? -1 : 0;

                $m   = $matrix[$i - 1][$j - 1];
                $d   = $matrix[$i - 1][$j];
                $r   = $matrix[$i][$j - 1];

                $matrix[$i][$j] = min($m, $d, $r) + 1 + $add;
            }
        }

        return $cost = $matrix[strlen($b)][strlen($a)];
    }
}