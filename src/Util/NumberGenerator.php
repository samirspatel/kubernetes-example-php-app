<?php

namespace App\Util;

/**
 * Class NumberGenerator
 * @package App\Util
 */
class NumberGenerator
{
    /**
     * Generate a random number
     *
     * @return int
     */
    public function random(): int
    {
        return rand(1, 100);
    }
}