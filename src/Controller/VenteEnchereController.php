<?php

namespace App\Controller;

use App\Entity\VenteEnchere;
use App\Form\VenteEnchereType;
use App\Repository\VenteEnchereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vente_enchere")
 */
class VenteEnchereController extends AbstractController
{
    /**
     * @Route("/", name="vente_enchere_index", methods={"GET"})
     */
    public function index(VenteEnchereRepository $venteEnchereRepository): Response
    {
        return $this->render('vente_enchere/index.html.twig', [
            'vente_encheres' => $venteEnchereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vente_enchere_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $venteEnchere = new VenteEnchere();
        $venteEnchere->setDate(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
        $form = $this->createForm(VenteEnchereType::class, $venteEnchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($venteEnchere);
            $entityManager->flush();

            return $this->redirectToRoute('vente_enchere_index');
        }

        return $this->render('vente_enchere/new.html.twig', [
            'vente_enchere' => $venteEnchere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vente_enchere_show", methods={"GET"})
     */
    public function show(VenteEnchere $venteEnchere): Response
    {
        return $this->render('vente_enchere/show.html.twig', [
            'vente_enchere' => $venteEnchere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vente_enchere_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VenteEnchere $venteEnchere): Response
    {
        $form = $this->createForm(VenteEnchereType::class, $venteEnchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vente_enchere_index');
        }

        return $this->render('vente_enchere/edit.html.twig', [
            'vente_enchere' => $venteEnchere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vente_enchere_delete", methods={"POST"})
     */
    public function delete(Request $request, VenteEnchere $venteEnchere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$venteEnchere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($venteEnchere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vente_enchere_index');
    }
}
