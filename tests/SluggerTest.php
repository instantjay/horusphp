<?php

namespace instantjay\horusphp\Tests;

use instantjay\horusphp\Slugger;
use PHPUnit\Framework\TestCase;

class SluggerTest extends TestCase
{
    public function testCreateSlug()
    {
        $slugger = new Slugger();

        $result = $slugger->createSlug('My Own String');
        $this->assertEquals('my-own-string', $result);

        $result = $slugger->createSlug('example!!!string');
        $this->assertEquals('example-string', $result);
    }
}
