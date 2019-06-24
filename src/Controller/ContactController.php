<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(ContactNotification $notification, Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $notification->notify($contact);
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

    /**
     * @Route("/contact/success", name="contact_success")
     */
    public function success()
    {
        return $this->render('contact/success.html.twig');
    }
}
