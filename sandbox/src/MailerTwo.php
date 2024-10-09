<?php

namespace sandbox;

class MailerTwo
{
    public static function send(string $email, string $message)
    {
        if(empty($email)) {
            throw new \InvalidArgumentException;
        }

        echo "Send $message to $email";

        return true;
    }
}