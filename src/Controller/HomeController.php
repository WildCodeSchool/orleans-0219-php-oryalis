<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        return $this->render(
            'index.html.twig'
        );
    }
}
