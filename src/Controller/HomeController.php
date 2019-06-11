<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="index")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/formation", name="formation")
     * @param FormationRepository $formationRepository
     * @return Response
     */
}
