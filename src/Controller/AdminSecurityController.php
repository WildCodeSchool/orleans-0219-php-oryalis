<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\SecurityType;
use App\Form\MailType;
class AdminSecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(
        AuthenticationUtils $authenticationUtils): Response {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
    }

    /**
     * @Route("/login/forgottenPassword", name="forgottenPassword")
     *
     */
    public function forgottenPassword(
        Request $request,
        AdminRepository $adminRepository,
        TokenGeneratorInterface $tokenGenerator,
        \Swift_Message $mailer
    ): Response {

        $mail = $request->request->get('mail');
        $form = $this->createForm(MailType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $token = $tokenGenerator->generateToken();
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody(
                    $this->renderView(
                        'HelloBundle:Hello:email.txt.twig',
                        ['name' => $name]
                    )
                )
            ;
            $mailer->send($message);

            return $this->render($message);

        }

        return $this->render('security/forgottenPassword.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/login/resetPassword", name="app_reset_password")
     *
     */
    public function reset()
    {
        return $this->render('security/resetPassword.html.twig');
    }
}
