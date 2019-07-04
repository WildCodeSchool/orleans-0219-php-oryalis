<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\Configuration;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Swift_Mailer $mailer, Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mail = $contact->getEmail();
            $mailAdmin = $this->getParameter('mailAdmin');
            $message = (new \Swift_Message())
                ->setFrom($mail)
                ->setTo($mailAdmin)
                ->setBody(
                    $this->renderView(
                        'mail/mail.html.twig',
                        ['contact' => $contact, 'mail' => $mail, 'mailAdmin' => $mailAdmin]
                    ),
                    'text/html'
                );
            $mailer->send($message);
            $this->addFlash(
                'success',
                'Votre message a bien été envoyé'
            );
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contact' => $contact,
            'form' => $form->createView()
        ]);
    }
}
