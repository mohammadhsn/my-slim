<?php

use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    /** @test */
    public function it_says_hello()
    {
        $this->assertEquals(1, 1);
    }
}
