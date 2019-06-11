<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/formation", name="admin_formation")
     * @param FormationRepository $formationRepository
     * @return Response
     */

    public function index(FormationRepository $formationRepository): Response
    {
        return $this->render('admin/formation.html.twig', [
            'formations' => $formationRepository -> findAll(),
        ]);
    }
}
