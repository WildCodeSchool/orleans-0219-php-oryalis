<?php

namespace App\notification;

use App\Entity\Contact;
use Swift_Message;
use Twig\Environment;

class ContactNotification
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $render;

    /**
     * ContactNotification constructor.
     * @param \Swift_Mailer $mailer
     * @param Environment $render
     */
    public function __construct(\Swift_Mailer $mailer, Environment $render)
    {
        $this->mailer = $mailer;
        $this->render = $render;
    }

    public function notify(Contact $contact)
    {
        $message = (new Swift_Message())


            // Set the From address with an associative array
            ->setFrom('noreply@test.com')
            // Set the To addresses with an associative array (setTo/setCc/setBcc)
            ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])

            ->setReplyTo($contact->getEmail())
            // And optionally an alternative body
            ->setBody($this->render->render('mail/mail.html.twig', ['contact' => $contact]), 'text/html');

        $this->mailer->send($message);
    }
}