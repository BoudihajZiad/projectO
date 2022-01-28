<?php

namespace App\Controller;

use App\Entity\Alerte;
use App\Entity\Campagne;
use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\DestinataireCamp;
use App\Entity\GroupeContact;
use App\Entity\ListeDestinataire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class CompagneController extends AbstractController
{

    /**
     * @Route("/createCompagne/", name="createCompagne")
     */
    public function afficherContact(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('App:MessageSimple')->findAll();
        $contact = $em->getRepository('App:Contact')->findAll();
        $groupe = $em->getRepository('App:GroupeContact')->findAll();
        $liste = $em->getRepository('App:ListeDestinataire')->findAll();

        if (!$liste) {
            $response = "aucune liste ajoutée";
        } else {
            $response = "";
        }
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $idi = $session->get('user')->getId();

        $labelEntity = $em->getRepository('App:LabelService')->findByIdUser($idi);
        return $this->render("/compagne/createCompagne.html.twig", array("response" => $response, "messages" => $message, "listes" => $liste, "contacts" => $contact, "groupes" => $groupe, "labels" => $labelEntity));
    }

    /**
     * @Route("/messageFind/{id}/", name="messageFind")
     */
    public function messageFind($id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $messageEntity = $em->getRepository('App:MessageSimple')->findOneById($id);

        if ($messageEntity) {
            $jsonData = array(
                'id' => $messageEntity->getId(),
                'langue' => $messageEntity->getLangue(),
                'type' => $messageEntity->getType(),
                'message' => $messageEntity->getMessage(),
            );
            return new JsonResponse($jsonData);
        } else {
            $erreur = "ERREUR";
            $jsonData = array(
                'err' => $erreur,
            );
            return new JsonResponse($jsonData);
        }
    }

    /**
     * @Route("/messageAddListeContact/{id}/", name="messageAddListeContact")
     */
    public function messageAddListeContact(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $contactEntity = $em->getRepository('App:Contact')->findOneById($id);
        $nomContact = $contactEntity->getNom();
        $listeEntity = $em->getRepository('App:ListeDestinataire')->findByNom($nomContact);
        $destCampagne = $em->getRepository('App:DestinataireCamp')->findByNom($nomContact);
//        $contId = $session->get('user')->getId();
//        $UserEntity = $em->getRepository('App:Client')->findOneById($contId);

//        $theId = $request->get('idd');
        if (!$listeEntity) {
            $Listetity = new ListeDestinataire();
            $Listetity->setNom($nomContact)
                ->setType("Contact")
                ->setNbDestinataires(2);

            $em->persist($Listetity);
            $em->flush();

            $cmnetity = new Campagne();
            $cmnetity->setDest($nomContact);

            $em->persist($Listetity);
            $em->flush();

//            $destCampagne = new DestinataireCamp();
//            $destCampagne->setNom($nomContact)
//                ->setNbDest(1)
//                ->setIddCampagne($theId)
//                ->setIdContact($UserEntity);
//
//            $em->persist($Listetity);
//            $em->flush();

            $jsonData = array(
                'nom' => $nomContact,
                'type' => "Contact",
                'err' => "",
            );
            return new JsonResponse($jsonData);
        } else {
            $jsonData = array(
                'err' => "eroronbjfd",
                'nom' => "",
                'type' => "",
            );
            return new JsonResponse($jsonData);
        }
    }


    /**
     * @Route("/messageAddListeGroupe/{id}/", name="messageAddListeGroupe")
     */
    public
    function messageAddListeGroupe(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $GroupeEntity = $em->getRepository('App:GroupeContact')->findOneById($id);
        $nomContact = $GroupeEntity->getNom();
        $listeEntity = $em->getRepository('App:ListeDestinataire')->findByNom($nomContact);

        if (!$listeEntity) {
            $Listetity = new ListeDestinataire();
            $Listetity->setNom($nomContact)
                ->setType("Contact")
                ->setNbDestinataires(2);

            $em->persist($Listetity);
            $em->flush();

            $jsonData = array(
                'nom' => $nomContact,
                'type' => "Groupe de contact",
                'err' => "",
            );
            return new JsonResponse($jsonData);
        } else {
            $jsonData = array(
                'err' => "eroronbjfd",
                'nom' => "",
                'type' => "",
            );
            return new JsonResponse($jsonData);
        }
    }

    /**
     * @Route("ListeCharger/", name="ListeCharger")
     */
    public
    function ListeCharger()
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $Liste = $em->getRepository('App:ListeDestinataire')->findAll();

        if ($Liste) {
            $idx = 0;
            $jsonData = array();
            foreach ($Liste as $Listes) {
                $temp = array(
                    'id' => $Listes->getId(),
                    'nom' => $Listes->getNom(),
                    'type' => $Listes->getType(),
                );
                $jsonData[$idx++] = $temp;
                return new JsonResponse($jsonData);
            }
        } else {
            return new Response("Aucun produit disponible");
        }
    }

    /**
     * @Route("desdele/", name="desdele")
     */
    public
    function Listede()
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
//        $em ->
//        $qb = $em->createQueryBuilder()
//            ->delete('u')
//            ->from('ListeDestinataire', 'u');

        $supp = $em->getRepository('App:ListeDestinataire')->deleAll();
        $em->flush();

        return new Response("done");
    }

    /**
     * @Route("/desajou/", name="desajou")
     */
    public
    function desajou(Request $request)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
//        $GroupeEntity = $em->getRepository('App:GroupeContact')->findOneById($id);
//        $nomContact = $GroupeEntity->getNom();
//        $listeEntity = $em->getRepository('App:ListeDestinataire')->findAll();

        $canal = $request->get('canal1');
        $type = $request->get('type1');
        $nomCompagne = $request->get('nomCampagne');
        $categorie = $request->get('categorie');
        $planification = $request->get('planification');
        $description = $request->get('descriptionCampagne');
        $silence = $request->get('sil');
        $promotionnelle = $request->get('categorieP');
        $msgStock = $request->get('msgStock');
        $label = $request->get('label');
        $titrem = $request->get('lehjtk');
        $corpsm = $request->get('vdjidd');
        $ses = $session->get('user');
        $id = $request->get('idd');
        $idUdser = $ses->getId();
        $userEntity = $em->getRepository('App:Client')->findOneById($idUdser);

        $MsgEntity = $em->getRepository('App:MessageSimple')->findOneById($msgStock);

        $campagneEtity = new Campagne();
        $campagneEtity->setCanal($canal)
            ->setType($type)
            ->setNom($nomCompagne)
            ->setCategorie($categorie)
            ->setPlanification($planification)
            ->setDescription($description)
            ->setSilence($silence)
            ->setCategoriePromotionnelle($promotionnelle)
            ->setLabel($label)
            ->setTitreMessage($titrem)
            ->setCorpsMessage($corpsm)
            ->setIdUser($userEntity)
            ->setIdMessageSimple($MsgEntity)
            ->setIdd($id);

        $em->persist($campagneEtity);
        $em->flush();
        $ddf = date("Y/m/d");
        $alerteEtity = new Alerte();
        $alerteEtity->setEmetteur("Compagne créer")
            ->setObjet("Création de la campagne dont le nom est: '$nomCompagne'")
            ->setHeureEnvoi($ddf)
            ->setStatut('non lu');

        $em->persist($alerteEtity);
        $em->flush();


        $campagne = $em->getRepository('App:Campagne')->findOneByNom($nomCompagne);
        $jsonData = array(
            'id' => $campagne->getId(),
            'nom' => $campagne->getNom(),
        );
        return new JsonResponse($jsonData);
    }

    /**
     * @Route("/gestionCampagne/", name="gestionCampagne")
     */
    public
    function afficherGestion(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $campagne = $em->getRepository('App:Campagne')->findAll();

//        $liste = $em->getRepository('App:ListeDestinataire')->findAll();

//        if (!$liste) {
//            $response = "aucune liste ajoutée";
//        } else {
//            $response = "";
//        }
        return $this->render("/compagne/gestionCampagne.html.twig", array('campagnes' => $campagne));
    }

    /**
     * @Route("/exportCampagne/{id}/", name="exportCampagne")
     */
    public
    function exportCampagne(Request $request, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $campagne = $em->getRepository('App:Campagne')->findOneById($id);

        function filterData(&$str)
        {
            $str = preg_replace("/\t/", "\\t", $str);
            $str = preg_replace("/\r?\n/", "\\n", $str);
            if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }

        $fileName = "members-data_" . date('Y-m-d') . ".xls";
        $fields = array('NUMERO', 'NOM', 'CANAL', 'TYPE', 'CATEGORIE', 'PLANIFICATION', 'DESCRIPTION', 'SILENCE', 'CATEGORIE PROMOTIONNELLE');
        $vals = array($campagne->getId(), $campagne->getCanal(), $campagne->getType(), $campagne->getNom(), $campagne->getCategorie(), $campagne->getPlanification(), $campagne->getSilence(), $campagne->getCategoriePromotionnelle(), $campagne->getLabel(), $campagne->getTitreMessage(), $campagne->getCorpsMessage());
        $excelData = implode("\t", array_values($fields)) . "\n";
        $excelData .= implode("\t", array_values($vals)) . "\n";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        echo $excelData;

        return new Response("");
    }
}