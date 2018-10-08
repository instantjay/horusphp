<?php

namespace instantjay\horusphp\Tests;

use instantjay\horusphp\Model\Rgb;
use PHPUnit\Framework\TestCase;

class RgbTest extends TestCase
{
    public function testConstructor()
    {
        $red = 75;
        $green = 100;
        $blue = 125;

        $rgb = new Rgb($red, $green, $blue);

        $this->assertEquals($red, $rgb->getRed());
        $this->assertEquals($green, $rgb->getGreen());
        $this->assertEquals($blue, $rgb->getBlue());
    }

    public function testRandomize()
    {
        for ($i = 0; $i < 10; $i++) {
            $rgb = Rgb::randomize(0, 50);
            $this->assertRgbValuesAreWithinRange($rgb, 0, 50);
        }

        for ($i = 0; $i < 10; $i++) {
            $rgb = Rgb::randomize(150, 150);
            $this->assertRgbValuesAreWithinRange($rgb, 150, 150);
        }
    }

    private function assertRgbValuesAreWithinRange(Rgb $rgb, $min, $max)
    {
        $this->assertGreaterThanOrEqual($min, $rgb->getRed());
        $this->assertLessThanOrEqual($max, $rgb->getRed());

        $this->assertGreaterThanOrEqual($min, $rgb->getGreen());
        $this->assertLessThanOrEqual($max, $rgb->getGreen());

        $this->assertGreaterThanOrEqual($min, $rgb->getBlue());
        $this->assertLessThanOrEqual($max, $rgb->getBlue());
    }
}
