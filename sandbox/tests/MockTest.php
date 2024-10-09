<?php

use PHPUnit\Framework\TestCase;
use sandbox\MailerOne;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(MailerOne::class);

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }
}