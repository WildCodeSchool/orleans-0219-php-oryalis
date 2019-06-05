<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 03/06/19
 * Time: 15:09
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeeController extends AbstractController
{
    /**
     * @Route("/",name="index")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }
}
