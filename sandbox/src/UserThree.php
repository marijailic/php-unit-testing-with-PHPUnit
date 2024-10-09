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
        return MailerThree::send($this->email, $message);
    }
}