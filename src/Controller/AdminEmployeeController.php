<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/employee")
 */
class AdminEmployeeController extends AbstractController
{
    /**
     * @Route("/", name="admin_employee", methods={"GET"})
     */
    public function index(EmployeeRepository $employeeRepository): Response
    {
        return $this->render('admin_employee/index.html.twig', [
            'employees' => $employeeRepository->findAll(),
        ]);
    }
}
