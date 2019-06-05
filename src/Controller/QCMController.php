<?php

namespace App\Controller;

use App\Repository\QCMAnswersRepository;
use App\Repository\QCMQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QCMController extends AbstractController
{
    /**
     * @Route("/qcm", name="q_c_m")
     */
    public function index(QCMAnswersRepository $answersRepository, QCMQuestionsRepository $questionsRepository):Response
    {
        return $this->render('qcm/index.html.twig', [
            'answers' => $answersRepository->findAll(),
            'questions' => $questionsRepository->findAll(),
        ]);
    }
}
