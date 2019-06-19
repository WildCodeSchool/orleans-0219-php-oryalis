<?php

namespace App\Controller;

use App\Repository\QCMAnswersRepository;
use App\Repository\QCMQuestionsRepository;
use Feed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param QCMQuestionsRepository $questionsRepository
     * @param QCMAnswersRepository $answersRepository
     * @Route("/",name="index")
     * @return Response
     */

    public function index(QCMAnswersRepository $answersRepository, QCMQuestionsRepository $questionsRepository):Response
    {
        $rss = Feed::loadRss('http://qualite-securite-environnement.oryalis.com/feed/');
        $rss = $rss->item;
        return $this->render('home/index.html.twig', [
            $question = $questionsRepository->findOneBy([], ['year' => 'DESC', 'month' => 'DESC']),
            $answers = $answersRepository->findAll(),
            'feeds' => $rss,
            'question' => $question,
            'answers' => $answers,
        ]);
    }
}
