<?php


namespace App\Service;

use Swift_Message;
use Twig\Environment;

class Mailer
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


    public function notify()
    {
        $message = (new Swift_Message())
            // Set the From address with an associative array
            ->setFrom('user@mail.com')
            ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
            ->setReplyTo('admin@mail.com')
            ->setBody($this->render->render('mail/mail.html.twig'));

        $this->mailer->send($message);
    }
}

