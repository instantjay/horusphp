<?php

namespace instantjay\horusphp\Tests;

use instantjay\horusphp\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testIsValidEmailAddress()
    {
        $result = Validator::isValidEmailAddress('test@example.com');
        $this->assertTrue($result);

        $result = Validator::isValidEmailAddress('@example.com');
        $this->assertFalse($result);

        $result = Validator::isValidEmailAddress('example');
        $this->assertFalse($result);
    }
}
