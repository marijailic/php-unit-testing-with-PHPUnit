<?php

namespace sandbox;

class MailerOne
{
    public function sendMessage($email, $message): bool
    {
        if (empty($email)) {
            throw new \Exception;
        }

        sleep(3);
        echo "send $message to $email";
        return true;
    }

}