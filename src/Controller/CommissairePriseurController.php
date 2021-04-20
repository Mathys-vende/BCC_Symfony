<?php

namespace App\Controller;

use App\Entity\CommissairePriseur;
use App\Form\CommissairePriseurType;
use App\Repository\CommissairePriseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commissaire_priseur")
 */
class CommissairePriseurController extends AbstractController
{
    /**
     * @Route("/", name="commissaire_priseur_index", methods={"GET"})
     */
    public function index(CommissairePriseurRepository $commissairePriseurRepository): Response
    {
        return $this->render('commissaire_priseur/index.html.twig', [
            'commissaire_priseurs' => $commissairePriseurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="commissaire_priseur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commissairePriseur = new CommissairePriseur();
        $form = $this->createForm(CommissairePriseurType::class, $commissairePriseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commissairePriseur);
            $entityManager->flush();

            return $this->redirectToRoute('commissaire_priseur_index');
        }

        return $this->render('commissaire_priseur/new.html.twig', [
            'commissaire_priseur' => $commissairePriseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commissaire_priseur_show", methods={"GET"})
     */
    public function show(CommissairePriseur $commissairePriseur): Response
    {
        return $this->render('commissaire_priseur/show.html.twig', [
            'commissaire_priseur' => $commissairePriseur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commissaire_priseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CommissairePriseur $commissairePriseur): Response
    {
        $form = $this->createForm(CommissairePriseurType::class, $commissairePriseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commissaire_priseur_index');
        }

        return $this->render('commissaire_priseur/edit.html.twig', [
            'commissaire_priseur' => $commissairePriseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commissaire_priseur_delete", methods={"POST"})
     */
    public function delete(Request $request, CommissairePriseur $commissairePriseur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commissairePriseur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commissairePriseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commissaire_priseur_index');
    }
}
