<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
use App\Repository\NewsRepository;
use App\Repository\QuestionRepository;
use Feed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param QuestionRepository $questionsRepository
     * @param AnswerRepository $answersRepository
     * @Route("/",name="index")
     * @return Response
     */

    public function index(
        AnswerRepository $answersRepository,
        QuestionRepository $questionsRepository,
        NewsRepository $newsRepository
    ): Response {
        $rss = Feed::loadRss('http://qualite-securite-environnement.oryalis.com/feed/');
        $rss = $rss->item;
        return $this->render('home/index.html.twig', [
            $question = $questionsRepository->findOneBy([], ['year' => 'DESC', 'month' => 'DESC']),
            $answers = $answersRepository->findByQuestion($question),
            $news = $newsRepository->findOneBy([], ['date' => 'DESC']),
            'feeds' => $rss,
            'question' => $question,
            'answers' => $answers,
            'news' => $news,
        ]);
    }
}
