<?php

use PHPUnit\Framework\TestCase;
use sandbox\UserTwo;

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