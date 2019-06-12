<?php

namespace App\Controller;

use App\Entity\QCMAnswers;
use App\Repository\QCMAnswersRepository;
use App\Repository\QCMQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="index")
     */
    public function index(QCMAnswersRepository $answersRepository, QCMQuestionsRepository $questionsRepository):Response
    {
//        $loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
//        $twig = new \Twig\Environment($loader);
//        $twig->addExtension(new Twig_Extensions_Extension_Date());

        $question = $questionsRepository->findOneBy([], ['year' => 'DESC', 'month' => 'DESC']);
        dump($question);
        $answers = $answersRepository->findAll();

        return $this->render('home.html.twig', [
            'question' => $question,
            'answers' => $answers,
        ]);
    }
}
