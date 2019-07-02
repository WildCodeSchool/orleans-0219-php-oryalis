<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/07/19
 * Time: 16:27
 */

namespace App\Controller;

use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/history", name="questions_history")
     * @param QuestionRepository $questionRepository
     * @return Response
     */
    public function index(QuestionRepository $questionRepository) : Response
    {
        return $this->render('questions/questions.html.twig', [
            'questions' => $questionRepository->findAll()
        ]);
    }
}
