<?php

namespace sandbox;

class UserTwo
{
    public $email;
    protected $mailerCallable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailerCallable(callable $mailerCallable)
    {
        $this->mailerCallable = $mailerCallable;
    }

    public function notify(string $message)
    {
        return call_user_func($this->mailerCallable, $this->email, $message);
    }
}