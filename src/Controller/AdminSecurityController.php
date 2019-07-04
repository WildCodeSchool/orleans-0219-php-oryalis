<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use Doctrine\ORM\EntityManager;
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
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
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
        TokenGeneratorInterface $tokenGenerator,
        \Swift_Mailer $mailer
    ): Response {
        $form = $this->createForm(MailType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->getData()['email'];
            $em = $this->getDoctrine()->getManager();
            $admin = $em->getRepository(Admin::class)->findOneByEmail($email);
            if ($admin === null) {
                $this->addFlash('danger', 'Email Inconnu');
                return $this->redirectToRoute('forgottenPassword');
            }
            $token = $tokenGenerator->generateToken();
            $admin->setResetToken($token);
            $em->flush();
            $message = (new \Swift_Message('Hello Email'))
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody($this->renderView('mail/resetMail.html.twig', ['token' => $token]))
            ;
            $mailer->send($message);
        }
        return $this->render('security/forgottenPassword.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/login/resetPassword/{token}", name="app_reset_password")
     */
    public function reset(Request $request, UserPasswordEncoderInterface $passwordEncoder, string $token)
    {
        $form = $this->createForm(SecurityType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $admin = $em->getRepository(Admin::class)->findOneByResetToken($token);
            $admin->setPassword($passwordEncoder->encodePassword($admin, $form->getData()['password']));
            $token = null;
            $admin->setResetToken($token);
            $em->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/resetPassword.html.twig', ['token' => $token, 'form' => $form->createView()]);
    }
}
