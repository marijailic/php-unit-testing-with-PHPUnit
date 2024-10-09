<?php

use PHPUnit\Framework\TestCase;
use sandbox\UserThree;
use sandbox\MailerThree;

class UserThreeTest extends TestCase
{
    public function tearDown(): void
    {
        \Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new UserThree('dave@example.com');

        $mock = Mockery::mock('alias:' . MailerThree::class);

        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));
    }
}