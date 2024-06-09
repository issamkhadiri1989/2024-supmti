<?php

namespace App\Tests\App\Contact;

use App\Figure\Square\Square;
use PHPUnit\Framework\TestCase;

class SurfaceTest extends TestCase
{
    public function testComputeSquareSurface(): void
    {
        $square = new Square(10, 16);

        $surface =  $square->surface($square);

        $this->assertEquals(160, $surface);
    }
}