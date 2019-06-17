<?php

namespace App\Controller;

use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/training", name="admin_training")
     * @param TrainingRepository $trainingRepository
     * @return Response
     */

    public function index(TrainingRepository $trainingRepository): Response
    {
        return $this->render('admin/training.html.twig', [
            'trainings' => $trainingRepository -> findAll(),
        ]);
    }
}
