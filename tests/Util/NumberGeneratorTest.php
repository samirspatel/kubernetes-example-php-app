<?php

namespace App\Tests\Util;

use App\Util\NumberGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Class NumberGeneratorTest
 * @package App\Tests\Util
 */
class NumberGeneratorTest extends TestCase
{
    public function testAdd()
    {
        $generator = new NumberGenerator();
        $this->assertGreaterThan(1, $generator->random());
    }
}