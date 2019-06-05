<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 03/06/19
 * Time: 15:09
 */

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

//        $answer = new QCMAnswers();

        $isWinning = '';
//        if ($answer[$good_answer] == 1) {
//            $isWinning = 'Bravo !';
//        } else {
//            $isWinning = 'Ce n\'est pas la bonne réponse..';
//        }


        return $this->render('home.html.twig', [
            'answers' => $answersRepository->findAll(),
            'questions' => $questionsRepository->findAll(),
            'isWinning' => $isWinning,
            ]);
    }
}
