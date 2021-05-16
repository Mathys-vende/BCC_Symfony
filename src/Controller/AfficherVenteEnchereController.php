<?php

namespace App\Controller;


use App\Entity\Encherir;
use App\Entity\Vente;
use App\Entity\VenteEnchere;

use App\Form\EncherirType;
use App\Repository\LotRepository;
use App\Repository\VenteEnchereRepository;
use App\Repository\VenteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/afficher_vente_enchere")
 */
class AfficherVenteEnchereController extends AbstractController
{
    /**
         * @Route("/", name="afficher_vente_enchere")
     */
    public function index(VenteEnchereRepository $venteEnchereRepository): Response
    {
        return $this->render('afficher_vente_enchere/index.html.twig', [
            'venteEnchere' => $venteEnchereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/lot", name="afficher_vente_enchere_lots", methods={"GET","POST"})
     */
    public function afficherLots(Request $request, VenteEnchere $venteEnchere, VenteRepository $venteRepository, VenteEnchereRepository $venteEnchereRepository): Response
    {

    return $this->render('afficher_vente_enchere/lots.html.twig', [
            'id' => $venteEnchereRepository->find($venteEnchere->getId()),
            'ventes'=> $venteRepository->findForIdEnchere($venteEnchere->getId()),
        ]);
    }
    /**
     * @Route("/{id}/lot/{vente}/encherir", name="afficher_vente_enchere_lots_encherir", methods={"GET","POST"})
     *
     */
    public function encherirLot(Request $request,  Vente $vente, LotRepository $lotRepository): Response
    {
        $encherir = new Encherir();
        $encherir->setDate(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
        $encherir->setIdVente($vente);
        $encherir->setIdAcheteur($this->getUser());

        $form = $this->createForm(EncherirType::class, $encherir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($encherir);
            $entityManager->flush();

            return $this->redirectToRoute('encherir_index');
        }

        return $this->render('afficher_vente_enchere/encherir.html.twig', [
            'ventes'=> $lotRepository->find($vente->getIdLot()),
            'form' => $form->createView(),
        ]);
    }
}
