<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 03/07/19
 * Time: 14:17
 */

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("actualites", name="news_history")
     * @param NewsRepository $newsRepository
     * @return Response
     */
    public function index(NewsRepository $newsRepository) : Response
    {
        return $this->render('news_history/index.html.twig', [
            'news' => $newsRepository->findBy([], ['date' => 'DESC']),
        ]);
    }
}
