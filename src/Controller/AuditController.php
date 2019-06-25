<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuditController extends AbstractController
{
    /**
     * @Route("/audit", name="audit")
     */
    public function index()
    {
        return $this->render('audit/index.html.twig', [
            'controller_name' => 'AuditController',
        ]);
    }
}
