<?php

class User
{
    public $firstName;
    public $lastName;
    public $email;
    public $mailer;

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}