<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Entity\Produitcategorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        /*$repo = $this->getDoctrine()->getRepository(Categorie::class);
        $categorie = $repo->findAll();*/

        $repo =$this->getDoctrine()->getRepository(Produit::class);
        $idProd = $repo->findIdProduit(2);
        //$repo = $this->getDoctrine()->getRepository(Produitcategorie::class);


        return $this->render('home/index.html.twig', [

            'controller_name' => 'HomeController',
        ]);
    }
}
