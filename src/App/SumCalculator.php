<?php

namespace App\Handler;

class SumCalculator
{
    public function calculate(array $args) : int
    {
        $result = 0;
        foreach ($args as $arg) {
            if (!is_numeric($arg)) {
                throw new \Exception('args must be numeric');
            }
            $result += $arg;
        }

        return $result;
    }
}