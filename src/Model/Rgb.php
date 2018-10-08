<?php

namespace instantjay\horusphp\Model;

class Rgb
{
    protected $red;
    protected $green;
    protected $blue;

    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * Generates an RGB object with a random color, and the colors are chosen randomly given the optional constraints
     *
     * @param integer $min
     * @param integer $max
     * @return Rgb
     */
    public static function randomize($min = 0, $max = 255)
    {
        $color = new Rgb(
            mt_rand($min, $max),
            mt_rand($min, $max),
            mt_rand($min, $max)
        );

        return $color;
    }
}