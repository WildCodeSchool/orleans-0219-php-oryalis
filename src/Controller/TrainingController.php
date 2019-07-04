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
use Knp\Bundle\SnappyBundle\KnpSnappyBundle;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
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
            'trainings' => $trainingRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}/download", name="training_download", methods={"GET"})
     * @param Training $training
     * @param Pdf $knpSnappyBundle
     * @return Response
     */
    public function donwload(Training $training, Pdf $knpSnappyBundle): Response
    {
        $html = $this->renderView('formations/trainingPDF.html.twig', ['training' => $training]);

        return new PdfResponse(
            $knpSnappyBundle->getOutputFromHtml($html, ['user-style-sheet' => ['./build/pdf.css',]]),
            'training' . $training->getId() . '.pdf'
        );
    }

    /**
     * @Route("/{id}", name="training_show", methods={"GET"})
     * @param Training $training
     * @return Response
     */
    public function show(Training $training): Response
    {
        return $this->render('formations/show.html.twig', [
            'training' => $training,
        ]);
    }
}
