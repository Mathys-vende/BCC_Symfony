<?php

namespace App\Controller;

use App\Repository\VenteEnchereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficherVenteEnchereController extends AbstractController
{
    /**
     * @Route("/afficher_vente_enchere", name="afficher_vente_enchere")
     */
    public function index(VenteEnchereRepository $venteEnchereRepository): Response
    {
        return $this->render('afficher_vente_enchere/index.html.twig', [
            've' => $venteEnchereRepository->findAll(),
        ]);
    }
}
