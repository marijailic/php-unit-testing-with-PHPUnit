<?php

use PHPUnit\Framework\TestCase;
use sandbox\UserTwo;
use sandbox\MailerTwo;

class UserTwoTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new UserTwo('dave@example.com');

        $user->setMailerCallable(function(){
            echo 'mocked';
            return true;
        });

        $this->assertTrue($user->notify('Hello!'));
    }
}