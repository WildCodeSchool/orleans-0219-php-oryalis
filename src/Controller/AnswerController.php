<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Repository\AnswerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/answer")
 */
class AnswerController extends AbstractController
{
    /**
     * @Route("/{question}/new", name="answer_new", methods={"GET","POST"})
     */
    public function new(Request $request, Question $question): Response
    {
        $answer = new Answer();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $answer->setQuestion($question);
            $entityManager->persist($answer);
            $entityManager->flush();

            return $this->redirectToRoute('question_edit', [
                'id' => $answer->getQuestion()->getId(),
            ]);
        }

        return $this->render('admin/answer/new.html.twig', [
            'answer' => $answer,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="answer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Answer $answer): Response
    {
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('question_edit', [
                'id' => $answer->getQuestion()->getId(),
            ]);
        }

        return $this->render('admin/answer/edit.html.twig', [
            'answer' => $answer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="answer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Answer $answer): Response
    {
        if ($this->isCsrfTokenValid('delete' . $answer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($answer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('question_edit', [
            'id' => $answer->getQuestion()->getId(),
        ]);
    }
}
