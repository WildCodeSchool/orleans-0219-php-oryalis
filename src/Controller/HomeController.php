<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @route("/home", name="home_index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        return $this->render(
            'Home/index.html.twig'
        );
    }
}