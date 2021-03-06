<?php
/**
 * AssertionTest.php
 *
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @copyright 2017 George D. Cooksey, III
 */

namespace texdc\guard\test;

use PHPUnit\Framework\TestCase;
use texdc\guard\Assertion;

class AssertionTest extends TestCase
{
    public function testExtendsAssertion()
    {
        $verify = new Assertion();
        $this->assertInstanceOf('Assert\\Assertion', $verify);
    }

    public function testValidModulus()
    {
        $this->assertNull(Assertion::isModulus(24, 8));
        $this->assertNull(Assertion::isModulus(9, 3));
    }

    public function testInvalidModulus()
    {
        $this->expectException('Assert\AssertionFailedException');
        $this->expectExceptionMessage('Value 15 is not a modulus of 4');
        Assertion::isModulus(15, 4);
    }

    public function testValidNotModulus()
    {
        $this->assertNull(Assertion::notModulus(5, 3));
        $this->assertNull(Assertion::notModulus(45, 17));
    }

    public function testInvalidNotModulus()
    {
        $this->expectException('Assert\AssertionFailedException');
        $this->expectExceptionMessage('Value 12 is a modulus of 4');
        Assertion::notModulus(12, 4);
    }

    public function testValidNumericRange()
    {
        $this->assertNull(Assertion::numericRange(6, 6, 8));
        $this->assertNull(Assertion::numericRange(45, 40, 50));
    }

    public function testInvalidNumericRange()
    {
        $this->expectException('Assert\AssertionFailedException');
        $this->expectExceptionMessage('Value 12 is not between 15 and 20');
        Assertion::numericRange(12, 15, 20);
    }

    public function testValidNotNumericRange()
    {
        $this->assertNull(Assertion::notNumericRange(5, 6, 8));
        $this->assertNull(Assertion::notNumericRange(55, 40, 50));
    }

    public function testInvalidNotNumericRange()
    {
        $this->expectException('Assert\AssertionFailedException');
        $this->expectExceptionMessage('Value 18 is between 15 and 20');
        Assertion::notNumericRange(18, 15, 20);
    }

    public function testValidNotContains()
    {
        $this->assertNull(Assertion::notContains('foo', ':'));
        $this->assertNull(Assertion::notContains('bar', ';'));
    }

    public function testInvalidNotContains()
    {
        $this->expectException('Assert\AssertionFailedException');
        $this->expectExceptionMessage('Value ":test" contains ":"');
        Assertion::notContains(':test', ':');
    }
}
