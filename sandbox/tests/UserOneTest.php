<?php

use PHPUnit\Framework\TestCase;
use sandbox\UserOne;
use sandbox\MailerOne;

class UserOneTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new UserOne();

        $user->firstName = 'John';
        $user->lastName = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new UserOne();

        $this->assertEquals('', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new UserOne();

        $mockMailer = $this->createMock(MailerOne::class);

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
        $user = new UserOne();

        $mockMailer = $this->getMockBuilder(MailerOne::class)
            ->onlyMethods([])
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(\Exception::class);

        $user->notify('Hello');
    }
}