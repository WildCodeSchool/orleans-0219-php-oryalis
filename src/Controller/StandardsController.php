<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 02/07/19
 * Time: 14:57
 */

namespace App\Controller;

use App\Repository\StandardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StandardsController extends AbstractController
{
    /**
     * @Route("/normes", name="standards_index")
     * @param StandardRepository $standardRepository
     * @return Response
     */
    public function index(StandardRepository $standardRepository) : Response
    {
        return $this->render('standards/index.html.twig', [
            'standards' => $standardRepository->findAll()
            ]);
    }
}
