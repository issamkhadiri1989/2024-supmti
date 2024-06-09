<?php

namespace App\Figure\Square;

class Square
{
    public function __construct(private float $width, private float $height)
    {
    }

    public function surface(): float
    {
        return $this->width * $this->height;
    }
}