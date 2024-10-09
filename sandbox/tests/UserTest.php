<?php

use PHPUnit\Framework\TestCase;
use sandbox\User;
use sandbox\Mailer;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User();

        $user->firstName = 'John';
        $user->lastName = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);

        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('john@doe.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mockMailer);

        $user->email = 'john@doe.com';

        $this->assertTrue($user->notify('Hello'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();

        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->onlyMethods([])
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(\Exception::class);

        $user->notify('Hello');
    }
}