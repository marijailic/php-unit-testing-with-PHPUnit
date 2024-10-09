<?php

use PHPUnit\Framework\TestCase;
use sandbox\MailerTwo;

class MailerTwoTest extends TestCase
{
    public function testMailerTwo()
    {
        $this->assertTrue(MailerTwo::send('dave@example.com', 'Hello!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        MailerTwo::send('', '');
    }
}