<?php

namespace App\Controller;

use App\Repository\EncherirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/personne_info")
 */

class PersonneInfoController extends AbstractController
{
    /**
     * @Route("/", name="personne_info")
     */
    public function index(): Response
    {
        return $this->render('personne_info/index.html.twig', [
            'controller_name' => 'PersonneInfoController',
        ]);
    }

    /**
     * @Route("/enchere", name="personne_info")
     */
    public function enchere(EncherirRepository $encherirRepository): Response
    {
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        return $this->render('personne_info/enchere.html.twig', [
            'enchere'=>$encherirRepository->EnchereAcheteur($userId)

        ]);
    }
}
