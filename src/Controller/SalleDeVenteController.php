<?php

namespace App\Controller;

use App\Entity\SalleDeVente;
use App\Form\SalleDeVenteType;
use App\Repository\SalleDeVenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salle_de_vente")
 */
class SalleDeVenteController extends AbstractController
{
    /**
     * @Route("/", name="salle_de_vente_index", methods={"GET"})
     */
    public function index(SalleDeVenteRepository $salleDeVenteRepository): Response
    {
        return $this->render('salle_de_vente/index.html.twig', [
            'salle_de_ventes' => $salleDeVenteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="salle_de_vente_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salleDeVente = new SalleDeVente();
        $form = $this->createForm(SalleDeVenteType::class, $salleDeVente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salleDeVente);
            $entityManager->flush();

            return $this->redirectToRoute('salle_de_vente_index');
        }

        return $this->render('salle_de_vente/new.html.twig', [
            'salle_de_vente' => $salleDeVente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salle_de_vente_show", methods={"GET"})
     */
    public function show(SalleDeVente $salleDeVente): Response
    {
        return $this->render('salle_de_vente/show.html.twig', [
            'salle_de_vente' => $salleDeVente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="salle_de_vente_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SalleDeVente $salleDeVente): Response
    {
        $form = $this->createForm(SalleDeVenteType::class, $salleDeVente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salle_de_vente_index');
        }

        return $this->render('salle_de_vente/edit.html.twig', [
            'salle_de_vente' => $salleDeVente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salle_de_vente_delete", methods={"POST"})
     */
    public function delete(Request $request, SalleDeVente $salleDeVente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salleDeVente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salleDeVente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('salle_de_vente_index');
    }
}
