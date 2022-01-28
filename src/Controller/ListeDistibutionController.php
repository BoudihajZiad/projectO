<?php

namespace App\Controller;

use App\Entity\ListeDistribution;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ListeDistibutionController extends AbstractController
{
    /**
     * @Route("/listeDistribution/", name="listeDistribution")
     */
    public function listeDistribution(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $listeEntity = $em->getRepository('App:ListeDistribution')->findAll();
        return $this->render('liste_distibution/listeDistribution.html.twig', array('contacts' => $listeEntity));
    }

    /**
     * @Route("/chargerListe/", name="chargerListe")
     */
    public function chargerListe()
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $listeEntity = $em->getRepository('App:ListeDistribution')->findAll();

        if ($listeEntity) {
            $idx = 0;
            $jsonData = array();
            foreach ($listeEntity as $liste) {
                $qb = $em->createQueryBuilder();
                $qb->select('count(ListeDistribution.id)');
                $qb->from('App:ListeDistribution', 'ListeDistribution');

                $count = $qb->getQuery()->getSingleScalarResult();
                $temp = array(
                    'id' => $liste->getId(),
                    'nom' => $liste->getNom(),
                    'abonnee' => $liste->getAbonnee()
                );
                $jsonData[$idx++] = $temp;
            }
            return new JsonResponse($jsonData);
        } else {
            $jsonData = array(
                'err' => "erreur"
            );
            return new JsonResponse($jsonData);
        }
    }

    /**
     * @Route("/ajouterListeDistribution/", name="ajouterListeDistribution")
     */
    public function ajouterListeDistribution(Request $request): Response
    {
        $response = "";
        $succes = "";

        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $description = $request->get('des');
        $liste = $request->get('liste');

        if ($request->getMethod() == "POST") {
            $session = new Session();
            if (!$session->get('user')) {
                $session->set('connect', 'NOT OK');
                return $this->redirectToRoute("login");
            }

            if ($nom != "" && $liste != "") {
                $listeEntity = $em->getRepository('App:ListeDistribution')->findOneByNom($nom);
                if (!$listeEntity) {
                    $listeE = new ListeDistribution();
                    $listeE->setNom($nom)
                        ->setDescription($description)
                        ->setAbonnee($liste);

                    $em->persist($listeE);
                    $em->flush();
                    $succes = "Ajout liste effectué avec succès !";
                } else {
                    $response = "Nom déjà utilisé !! ";
                }
            } else {
                $response = "Champ obligatoire! ";
            }
        }
        return $this->render('liste_distibution/ajouterListeDistribution.html.twig', array("response" => $response, "succes" => $succes));
    }

    /**
     * @Route("/listeupdate/{id}/", name="listeupdate")
     */
    public function listeupdate(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();

        $response = $succes = "";

        $nom = $request->get('nom');
        $description = $request->get('des');
        $liste = $request->get('liste');
//        $llp = explode(",",$liste);
        $listeE = $em->getRepository('App:ListeDistribution')->findOneById($id);
        if ($request->getMethod() == "POST") {
            if ($nom != "" && $liste != "") {
                $listeEntity = $em->getRepository('App:ListeDistribution')->findOneByNom($nom);
                if (is_numeric($liste)) {
                    $listeE->setNom($nom)
                        ->setDescription($description)
                        ->setAbonnee($liste);

                    $em->persist($listeE);
                    $em->flush();
                    $succes = 1;
                } else {
                    $succes = 2;
                }
            } else {
                $succes = 3;
            }
        }
        return $this->render("/liste_distibution/listeUpdate.html.twig", array("liste" => $listeE, "succes" => $succes));
    }

    /**
     * @Route("/listeDelete/{id}/", name="listeDelete")
     */
    public function listeDelete(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $liste = $em->getRepository('App:ListeDistribution')->findOneById($id);

        $em->remove($liste);
        $em->flush();

        return $this->redirectToRoute("listeDistribution");
    }
}
