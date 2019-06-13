<?php

namespace App\Controller;

use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/formation", name="admin_formation")
     * @param TrainingRepository $trainingRepository
     * @return Response
     */

    public function index(TrainingRepository $trainingRepository): Response
    {
        return $this->render('admin/formation.html.twig', [
            'trainings' => $trainingRepository -> findAll(),
        ]);
    }
}
