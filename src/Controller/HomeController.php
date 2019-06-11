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
        $isWinning = '';
        return $this->render('home.html.twig', [
            'answers' => $answersRepository->findAll(),
            'questions' => $questionsRepository->findAll(),
            'isWinning' => $isWinning,
            ]);
    }
}
