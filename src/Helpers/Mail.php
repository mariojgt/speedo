<?php

namespace Speedo\Helpers;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class Mail
{
    public static function sendEmail()
    {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.mailtrap.io', 2525))
            ->setUsername('bb5cf64de455b7')
            ->setPassword('7d646d77611a0d');

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Wonderful Subject'))
            ->setFrom(['john@doe.com' => 'John Doe'])
            ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
            ->setBody('Here is the message itself');

        // Send the message
        $result = $mailer->send($message);
    }
}
