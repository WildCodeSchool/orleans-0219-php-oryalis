<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\News;
use App\Form\NewsType;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/news")
 */
class NewsController extends AbstractController
{
    /**
     * @param NewsRepository $newsRepository
     * @Route("/", name="news_index", methods={"GET"})
     * @return Response
     */
    public function index(NewsRepository $newsRepository): Response
    {
        return $this->render('admin_news/index.html.twig', [
            'news' => $newsRepository->findBy([], ['date' => 'DESC']),
        ]);
    }

    /**
     * @Route("/ajouter-une-actualite", name="news_new", methods={"GET","POST"})
     */
    public function new(Request $request, ObjectManager $manager): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form = $this->createFormBuilder($news)
            ->add('name', TextType::class)
            ->add('date', DateType::class, [
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'years' => range(2019, 2069, 1)
            ])
            ->add('content', TextareaType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager ->persist($news);
            $manager->flush();

            return $this->redirectToRoute('news_index');
//            return $this->redirectToRoute('news_show', ['id' => $news->getId()]);
        }

        return $this->render('admin_news/new.html.twig', [
            'admin_news' => $news,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="news_show", methods={"GET"})
     */
    public function show(News $news): Response
    {
        return $this->render('admin_news/show.html.twig', [
            'admin_news' => $news,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="news_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, News $news): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('news_index', [
                'id' => $news->getId(),
            ]);
        }

        return $this->render('admin_news/edit.html.twig', [
            'admin_news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param News $news
     * @Route("/{id}", name="news_delete", methods={"DELETE"})
     * @return Response
     */
    public function delete(Request $request, News $news): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($news);
            $entityManager->flush();
        }

        return $this->redirectToRoute('news_index');
    }
}
