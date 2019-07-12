<?php

namespace App\Controller;

use App\Entity\Standard;
use App\Form\StandardType;
use App\Repository\StandardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/normes")
 */
class AdminStandardController extends AbstractController
{
    /**
     * @Route("/", name="standard_index", methods={"GET"})
     */
    public function index(StandardRepository $standardRepository): Response
    {
        return $this->render('admin_standard/index.html.twig', [
            'standards' => $standardRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="standard_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $standard = new Standard();
        $form = $this->createForm(StandardType::class, $standard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($standard);
            $entityManager->flush();

            return $this->redirectToRoute('standard_index');
        }

        return $this->render('admin_standard/new.html.twig', [
            'standard' => $standard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="standard_show", methods={"GET"})
     */
    public function show(Standard $standard): Response
    {
        return $this->render('admin_standard/show.html.twig', [
            'standard' => $standard,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="standard_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Standard $standard): Response
    {
        $form = $this->createForm(StandardType::class, $standard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('standard_index', [
                'id' => $standard->getId(),
            ]);
        }

        return $this->render('admin_standard/edit.html.twig', [
            'standard' => $standard,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="standard_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Standard $standard): Response
    {
        if ($this->isCsrfTokenValid('delete'.$standard->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($standard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('standard_index');
    }
}
