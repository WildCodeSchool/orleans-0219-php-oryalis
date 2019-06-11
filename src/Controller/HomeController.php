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

        $questions = $questionsRepository->findOneById();
        $answers = $answersRepository->findAll();

        return $this->render('home.html.twig', [
            'questions' => $questions,
            'answers' => $answers,
            ]);
    }
}
