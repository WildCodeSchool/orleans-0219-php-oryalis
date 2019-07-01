<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/07/19
 * Time: 16:27
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends AbstractController
{
    public function index() : Request
    {
        $this->render('questions/questions.html.twig');
    }
}
