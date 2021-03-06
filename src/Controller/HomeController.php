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
        try {
            $rss = Feed::loadRss('http://qualite-securite-environnement.oryalis.com/feed/');
            $item = $rss->item;
        } catch (\Exception $feedException) {
            $this->addFlash('danger', $feedException->getMessage());
        }
        $date = new \DateTime();
        $question = $questionsRepository->findOneBy(['year'=> $date->format('Y'),'month'=> $date->format('m')]);
        $answers = $answersRepository->findByQuestion($question);
        $news = $newsRepository->findOneBy([], ['date' => 'DESC']);

        return $this->render('home/index.html.twig', [
            'feeds' => $item ?? null,
            'question' => $question,
            'answers' => $answers,
            'news' => $news,
        ]);
    }
}
