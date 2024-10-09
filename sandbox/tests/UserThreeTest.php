<?php

use PHPUnit\Framework\TestCase;
use sandbox\UserThree;
use sandbox\MailerTwo;

class UserThreeTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new UserThree('dave@example.com');

        $mock = Mockery::mock('alias:' . MailerTwo::class);

        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));
    }
}