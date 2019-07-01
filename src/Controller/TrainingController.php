<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 17/06/19
 * Time: 16:27
 */


namespace App\Controller;

use App\Entity\Training;
use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TrainingController
 * @package App\Controller
 * @Route("/formations")
 */

class TrainingController extends AbstractController
{
    /**
     * @Route("/", name="trainings_index")
     * @param TrainingRepository $trainingRepository
     * @return Response
     */
    public function index(TrainingRepository $trainingRepository): Response
    {
        return $this->render('formations/trainingList.html.twig', [
                'trainings' => $trainingRepository->findAll()
            ]);
    }

    /**
     * @Route("/{id}", name="training_show", methods={"GET"})
     * @param Training $training
     * @return Response
     */
    public function show(Training $training): Response
    {
        return $this->render('formations/show.html.twig', [
            'training' => $training
        ]);
    }
}
