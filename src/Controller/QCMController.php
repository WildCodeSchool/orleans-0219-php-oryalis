<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QCMController extends AbstractController
{
    /**
     * @Route("/qcm", name="q_c_m")
     */
    public function index()
    {
        return $this->render('qcm/index.html.twig', [
            'controller_name' => 'QCMController',
        ]);
    }
}
