<?php

namespace App\Controller;

use App\Entity\Trotti;
use App\Form\TrottiType;
use App\Repository\TrottiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trotti")
 */
class TrottiController extends AbstractController
{
    /**
     * @Route("/", name="trotti_index", methods={"GET"})
     */
    public function index(TrottiRepository $trottiRepository): Response
    {
        return $this->render('trotti/index.html.twig', [
            'trottis' => $trottiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="trotti_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $trotti = new Trotti();
        $form = $this->createForm(TrottiType::class, $trotti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($trotti);
            $entityManager->flush();

            return $this->redirectToRoute('trotti_index');
        }

        return $this->render('trotti/new.html.twig', [
            'trotti' => $trotti,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trotti_show", methods={"GET"})
     */
    public function show(Trotti $trotti): Response
    {
        return $this->render('trotti/show.html.twig', [
            'trotti' => $trotti,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trotti_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trotti $trotti): Response
    {
        $form = $this->createForm(TrottiType::class, $trotti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trotti_index');
        }

        return $this->render('trotti/edit.html.twig', [
            'trotti' => $trotti,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trotti_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trotti $trotti): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trotti->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trotti);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trotti_index');
    }
}
