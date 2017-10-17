<?php
/**
 * AssertionConcernTest.php
 *
 * @license   http://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @copyright 2017 George D. Cooksey, III
 */

namespace texdc\guard\test;

use PHPUnit\Framework\TestCase;
use function texdc\guard\verify;

class AssertionConcernTest extends TestCase
{
    public function testAssertionConcernExtendsAssertionChain()
    {
        $this->assertInstanceOf('Assert\\AssertionChain', verify('test'));
    }

    public function testUsesProperAssertionClass()
    {
        $this->assertNotNull(verify(16)->isModulus(8)->numericRange(8, 32));
    }

    public function testUniqueInstances()
    {
        $this->assertTrue(verify('foo') !== verify(15));
    }

    public function testCallValidatesMethod()
    {
        $this->expectException('RuntimeException');
        $this->expectExceptionMessage("assertion 'foo' does not exist.");
        verify(5)->foo();
    }

    public function testAllUpdatesMethod()
    {
        $this->assertNotNull(verify([7,9])->all()->integer());
    }

    public function testNullOrIsValid()
    {
        $this->assertNotNull(verify(null)->nullOr()->alnum());
    }
}
