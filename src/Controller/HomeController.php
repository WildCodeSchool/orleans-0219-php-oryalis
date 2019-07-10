<?php

namespace App\Controller;

use App\Repository\AnswerRepository;
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

    public function index(AnswerRepository $answersRepository, QuestionRepository $questionsRepository):Response
    {
        try {
            $rss = Feed::loadRss('http://qualite-securite-environnement.oryalis.com/feed/');
            $item = $rss->item;
        } catch (\Exception $feedException) {
            $this->addFlash('danger', $feedException->getMessage());
        }
        $date = new \DateTime();
        return $this->render('home/index.html.twig', [
            $question = $questionsRepository->findOneBy(['year'=> $date->format('Y'), 'month'=> $date->format('m')]),
            $answers = $answersRepository->findByQuestion($question),
            'feeds' => $item ?? null,
            'question' => $question,
            'answers' => $answers,
        ]);
    }
}
