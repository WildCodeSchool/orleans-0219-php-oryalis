<?php

namespace App\Controller;

use Feed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="index")
     */
    public function index()
    {
        $rss = Feed::loadRss('http://qualite-securite-environnement.oryalis.com/feed/');
        $rss = $rss->item;
        return $this->render('home/index.html.twig', ['feeds' => $rss]);
    }

    /**
     * @Route("/conseil", name="advice")
     */
    public function advice()
    {
        return $this->render('home/advice.html.twig');
    }
}
