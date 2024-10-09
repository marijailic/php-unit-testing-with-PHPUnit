<?php

namespace sandbox;

class UserOne
{
    public $firstName;
    public $lastName;
    public $email;
    public $mailer;

    public function setMailer(MailerOne $mailer)
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