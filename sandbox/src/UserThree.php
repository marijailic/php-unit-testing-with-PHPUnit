<?php

namespace sandbox;

class UserThree
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function notify(string $message)
    {
        return MailerTwo::send($this->email, $message);
    }
}