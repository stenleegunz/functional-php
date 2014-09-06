<?php
/**
 * Copyright (C) 2011-2013 by Lars Strojny <lstrojny@php.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Functional;

use ArrayIterator;

class TrueTest extends AbstractTestCase
{
    function setUp()
    {
        if (PHP_EXTRA_VERSION === 'hhvm') {
            $this->markTestSkipped('HHVM incompatibility');
        }
        parent::setUp();
        $this->trueArray = array(true, true, true, true);
        $this->trueIterator = new ArrayIterator($this->trueArray);
        $this->trueHash = array('k1' => true, 'k2' => true, 'k3' => true);
        $this->trueHashIterator = new ArrayIterator($this->trueHash);
        $this->falseArray = array(true, 1, true);
        $this->falseIterator = new ArrayIterator($this->falseArray);
        $this->falseHash = array('k1' => true, 'k2' => 1, 'k3' => true);
        $this->falseHashIterator = new ArrayIterator($this->falseHash);
    }

    function test()
    {
        $this->assertTrue(true(array()));
        $this->assertTrue(true(new ArrayIterator(array())));
        $this->assertTrue(true($this->trueArray));
        $this->assertTrue(true($this->trueIterator));
        $this->assertTrue(true($this->trueHash));
        $this->assertTrue(true($this->trueHashIterator));
        $this->assertFalse(true($this->falseArray));
        $this->assertFalse(true($this->falseIterator));
        $this->assertFalse(true($this->falseHash));
        $this->assertFalse(true($this->falseHashIterator));
    }

    function testPassNoCollection()
    {
        $this->expectArgumentError('Functional\true() expects parameter 1 to be array or instance of Traversable');
        true('invalidCollection');
    }
}
