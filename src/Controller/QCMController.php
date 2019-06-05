<?php

namespace App\Controller;

use App\Repository\QCMAnswersRepository;
use App\Repository\QCMQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QCMController extends AbstractController
{
    /**
     * @Route("/qcm", name="q_c_m")
     */
    public function index(QCMAnswersRepository $answersRepository, QCMQuestionsRepository $questionsRepository)
    {
        return $this->render('qcm/index.html.twig', [
            'answer' => $answersRepository->findAll(),
            'question' => $questionsRepository->findAll(),
        ]);
    }
}
