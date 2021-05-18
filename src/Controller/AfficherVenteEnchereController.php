<?php

namespace App\Controller;


use App\Entity\Encherir;
use App\Entity\Vente;
use App\Entity\VenteEnchere;

use App\Form\EncherirType;
use App\Repository\EncherirRepository;
use App\Repository\LotRepository;
use App\Repository\ProduitRepository;
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
            'venteEnchere' => $venteEnchereRepository->VenteEnchereActuelle(),
        ]);
    }

    /**
     * @Route("/{id}/lot", name="afficher_vente_enchere_lots", methods={"GET","POST"})
     */
    public function afficherLots(Request $request, VenteEnchere $venteEnchere, VenteRepository $venteRepository, VenteEnchereRepository $venteEnchereRepository, EncherirRepository $encherirRepository): Response
    {
        foreach ( $venteRepository->findAll() as $x => $vente ) {
            if($vente->getIdVenteEnchere() ===  $venteEnchereRepository->find($venteEnchere->getId())){
                $bestEnchere = $encherirRepository->BestEnchere($vente->getId());
                if($bestEnchere){
                    $listBestEnchere[$x] = $bestEnchere[0];
                }

            }
        }
        $bestEnchere = array_values($bestEnchere);

    return $this->render('afficher_vente_enchere/lots.html.twig', [
            'id' => $venteEnchereRepository->find($venteEnchere->getId()),
            'ventes'=> $venteRepository->findForIdEnchere($venteEnchere->getId()),
            'ListBestEnchere' => $listBestEnchere
        ]);
    }
    /**
     * @Route("/{id}/lot/{vente}/encherir", name="afficher_vente_enchere_lots_encherir", methods={"GET","POST"})
     */
    public function encherirLot(Request $request,  Vente $vente,ProduitRepository $produitRepository,LotRepository $lotRepository, EncherirRepository $encherirRepository): Response
    {
        $encherir = new Encherir();
        $encherir->setDate(new \DateTime('now', new \DateTimeZone('Europe/Paris')));
        $encherir->setIdVente($vente);
        $encherir->setIdAcheteur($this->getUser());

        if($encherirRepository->BestEnchere($vente->getId()) == null){
           $bestEnchere = 0;
        }else{
            $bestEnchere = $encherirRepository->BestEnchere($vente->getId())[0];
        }
        $form = $this->createForm(EncherirType::class, $encherir, array('bestEnchere' => $bestEnchere));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($encherir);

            $entityManager->flush();

            return $this->redirectToRoute('encherir_index');
        }

        return $this->render('afficher_vente_enchere/encherir.html.twig', [
            'BestEnchere'=>$encherirRepository->BestEnchere($vente->getId()),
            'ventes'=> $lotRepository->find($vente->getIdLot()),
            'produits'=> $produitRepository->ProduitDesVentes($vente->getIdLot()),
            'form' => $form->createView(),
        ]);
    }
}
