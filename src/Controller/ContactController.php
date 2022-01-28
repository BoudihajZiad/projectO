<?php


namespace App\Controller;

use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\GroupeContact;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact/", name="contact")
     */
    public function afficherContact(Request $request)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $idUs = $session->get('user')->getId();

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:Contact')->findByIdUser($idUs);

        return $this->render("/contact/contact.html.twig", array("contacts" => $contact));
    }

//
//    /**
//     * @Route("/contactLoad", name="contactLoad")
//     */
//    public function contactloading()
//    {
//        $session = new Session();
//        if (!$session->get('user')) {
//            $session->set('connect', 'NOT OK');
//            return $this->redirectToRoute("login");
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $contact = $em->getRepository('App:Contact')->findAll();
//
//        if ($contact) {
//            $idx = 0;
//            $jsonData = array();
//            foreach ($contact as $contacts) {
//                $temp = array(
//                    'id' => $contacts->getId(),
//                    'nom' => $contacts->getNom(),
//                    'telephone' => $contacts->getTelephone(),
//                    'email' => $contacts->getEmail(),
//                    'adresse' => $contacts->getAdresse(),
//                    'groupe' => $contacts->getGroupe(),
//                );
//                $jsonData[$idx++] = $temp;
//            }
//            return new JsonResponse($jsonData);
//        } else {
//            return new Response("Aucun produit disponible");
//        }
//    }
//
///**
// * @Route("/contactSearch/{id}/", name="contactSearch")
// */
//public
//function contactsearch($id)
//{
//    $session = new Session();
//    if (!$session->get('user')) {
//        $session->set('connect', 'NOT OK');
//        return $this->redirectToRoute("login");
//    }
//
//    $em = $this->getDoctrine()->getManager();
//    $contact = $em->getRepository('App:Contact')->findOneById($id);
//
//    if ($contact) {
//        $jsonData = array(
//            'id' => $contact->getId(),
//            'nom' => $contact->getNom(),
//            'telephone' => $contact->getTelephone(),
//            'email' => $contact->getEmail(),
//            'adresse' => $contact->getAdresse(),
//            'groupe' => $contact->getGroupe(),
//        );
//        return new JsonResponse($jsonData);
//    } else {
//        $jsonData = array(
//            'reponse' => "Aucun contact sous cet ID!",
//        );
//        return new JsonResponse($jsonData);
//    }
//}

    /**
     * @Route("/ajouterContact", name="ajouterContact")
     */
    public
    function ajouterContact(Request $request)
    {

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('App:GroupeContact')->findAll();

        return $this->render("/contact/ajouterContact.html.twig", array('groupes' => $groupe));
    }

    /**
     * @Route("/AddContact", name="AddContact")
     */
    public
    function AddContact(Request $request)
    {
        $response = "";
        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $telephone = $request->get('telephone');
        $email = $request->get('email');
        $adresse = $request->get('adresse');
        $groupe = $request->get('groupe');

        $prefix = substr($telephone, 0, 3);

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $idUs = $session->get('user')->getId();
        $clientEntity = $em->getRepository('App:Client')->findOneById($idUs);

        $groupee = $em->getRepository('App:GroupeContact')->findOneById($groupe)->getNom();

        if ($nom != "" && $telephone != "") {
            if (strlen($telephone) == 12) {
                if ($prefix == "212") {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                        $mailTest = $em->getRepository('App:Contact')->findOneByEmail($email);
//                        if(!$mailTest){
                        $groupeEntity = $em->getRepository('App:GroupeContact')->findOneById($groupe);
                        $contact = new Contact();
                        $contact->setNom($nom)
                            ->setTelephone($telephone)
                            ->setEmail($email)
                            ->setAdresse($adresse)
                            ->setgroupe($groupee)
                            ->setIdGroupe($groupeEntity)
                            ->setIdUser($clientEntity);

                        $em->persist($contact);
                        $em->flush();
                        $response = 1;

                    } else {
                        $response = 3;
                    }
                } else {
                    $response = 4;
                }
            } else {
                $response = 5;
            }
        } else {
            $response = 6;
        }

        return new JsonResponse($response);
    }

//    /**
//     * @Route("/recherchePourModifier/{id}/")
//     */
//    public
//    function recherchePourMfodifier($id)
//    {
//        $session = new Session();
//        if (!$session->get('user')) {
//            $session->set('connect', 'NOT OK');
//            return $this->redirectToRoute("login");
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $contact = $em->getRepository('App:Contact')->findOneById($id);
//
//        if ($contact) {
//            $jsonData = array(
//                'nom' => $contact->getNom(),
//                'telephone' => $contact->getTelephone(),
//                'email' => $contact->getEmail(),
//                'adresse' => $contact->getAdresse(),
//                'groupe' => $contact->getGroupe(),
//            );
//            return new JsonResponse($jsonData);
//        } else {
//            return new JsonResponse("Aucun produit disponible");
//        }
//    }

    /**
     * @Route("/modificationContact/{id}/", name="modificationContact")
     */
    public
    function modificationContact(Request $request, $id): Response
    {
        $session = new Session();
        if (!$session->get('user') || $session->get('connect') != 'OK') {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:Contact')->findOneById($id);
        $groupe = $em->getRepository('App:GroupeContact')->findAll();

        return $this->render('contact/modifierContact.html.twig', array('contacts' => $contact, 'groupes' => $groupe));
    }

    /**
     * @Route("/modifierContact/{id}/", name="modifierContact")
     */
    public
    function modifier(Request $request, $id)
    {
        $response = "";
        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $telephone = $request->get('telephone');
        $email = $request->get('email');
        $adresse = $request->get('adresse');
        $groupe = $request->get('groupe');

        $prefix = substr($telephone, 0, 3);

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $groupee = $em->getRepository('App:GroupeContact')->findOneById($groupe)->getNom();

        if ($nom != "" && $telephone != "") {
            if (strlen($telephone) == 12) {
                if ($prefix == "212") {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $groupeEntity = $em->getRepository('App:GroupeContact')->findOneById($groupe);
                        $contact = $em->getRepository('App:Contact')->findOneById($id);
                        $contact->setNom($nom)
                            ->setTelephone($telephone)
                            ->setEmail($email)
                            ->setAdresse($adresse)
                            ->setGroupe($groupee)
                            ->setIdGroupe($groupeEntity);

                        $em->persist($contact);
                        $em->flush();
                        $response = 1;
                    } else {
                        $response = 3;
                    }
                } else {
                    $response = 4;
                }
            } else {
                $response = 5;
            }
        } else {
            $response = 6;
        }

        return new JsonResponse($response);
    }


    /**
     * @Route("/supprimerContact/{id}/", name="supprimerContact")
     */
    public
    function delete(Request $request, $id)
    {
        $response = "";
        $succes = "";

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:Contact')->findOneById($id);

        $em->remove($contact);
        $em->flush();

        return new Response($response);
    }

    /**
     * @Route("/groupeContact", name="groupeContact")
     */
    public
    function groupeContact(): Response
    {
        $session = new Session();
        if (!$session->get('user') || $session->get('connect') != 'OK') {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $id = $session->get('user');
        $idd = $id->getId();

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:GroupeContact')->findByIdUser($idd);

        return $this->render('/contact/groupeContact.html.twig', array("contacts" => $contact, 'id' => $idd));
    }

    /**
     * @Route("/groupeContactAjout/", name="groupeContactAjout")
     */
    public
    function groupeContactAjout(Request $request): Response
    {
        $session = new Session();
        if (!$session->get('user') || $session->get('connect') != 'OK') {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $response = "";

        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nomAj');

        $idUs = $session->get('user')->getId();
        $clientEntity = $em->getRepository('App:Client')->findOneById($idUs);

        if ($nom != "") {
            $groupeEntity = $em->getRepository('App:GroupeContact')->findOneByNom($nom);
            if (!$groupeEntity) {
                $groupeContact = new GroupeContact();
                $groupeContact->setNom($nom)
                    ->setIdUser($clientEntity);

                $em->persist($groupeContact);
                $em->flush();
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        return new JsonResponse($response);
    }

//    /**
//     * @Route("/groupeContactCharger/", name="groupeContactCharger")
//     */
//    public function groupeContactCharger()
//    {
//        $session = new Session();
//        if (!$session->get('user')) {
//            $session->set('connect', 'NOT OK');
//            return $this->redirectToRoute("login");
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $groupeContact = $em->getRepository('App:GroupeContact')->findAll();
//
//        if ($groupeContact) {
//            $idx = 0;
//            $jsonData = array();
//            foreach ($groupeContact as $contacts) {
//                $temp = array(
//                    'id' => $contacts->getId(),
//                    'nom' => $contacts->getNom(),
//                );
//                $jsonData[$idx++] = $temp;
//            }
//            return new JsonResponse($jsonData);
//        } else {
//            return new Response("Aucun produit disponible");
//        }
//    }
//

    /**
     * @Route("/groupeContactPlus/{id}/", name="groupeContactPlus")
     */
    public function groupeContactPlus($id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $groupeContact = $em->getRepository('App:GroupeContact')->findOneById($id);
        $groe = $groupeContact->getNom();
        $contact = $em->getRepository('App:Contact')->findByGroupe($groe);
        $notInContact = $em->getRepository('App:Contact')->gg($groe);

//        $notInContact = $em->createQueryBuilder()
//            ->select('u')
//            ->from('Contact', 'u')
//            ->where('u.groupe NOT LIKE ',$groe);

        return $this->render("/contact/contactPlus.html.twig", array("groupecontact" => $groupeContact, "notgroupes" => $notInContact, "contacts" => $contact));
    }

    /**
     * @Route("/groupeContactupdate/{id}/", name="groupeContactupdate")
     */
    public function groupeContactupdate($id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $groupeContact = $em->getRepository('App:GroupeContact')->findOneById($id);

        return $this->render("/contact/groupeContactupdate.html.twig", array("groupecontact" => $groupeContact));
    }
//
//    /**
//     * @Route("/groupeContactDelete/{id}/", name="groupeContactDelete")
//     */
//    public function groupeContactDelete($id)
//    {
//        $session = new Session();
//        if (!$session->get('user')) {
//            $session->set('connect', 'NOT OK');
//            return $this->redirectToRoute("login");
//        }
//
//        $em = $this->getDoctrine()->getManager();
//        $groupeContact = $em->getRepository('App:GroupeContact')->findOneById($id);
//
//        return $this->render("/contact/groupeContactupdate.html.twig", array("groupecontact" => $groupeContact));
//    }
//

    /**
     * @Route("/modifierLeGroupe/", name="modifierLeGroupe")
     */
    public function modifierLeGroupe(Request $request)
    {
        $succes = "";

        $em = $this->getDoctrine()->getManager();

        $id = $request->get('iid');
        $groupe = $request->get('groupe');
        $groupeId = $request->get('groupeId');

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $Gcontact = $em->getRepository('App:GroupeContact')->findOneById($groupeId);

        if ($id != "") {
            $contact = $em->getRepository('App:Contact')->findOneById($id);
            $contact->setGroupe($groupe);
            $contact->setIdGroupe($Gcontact);

            $em->persist($contact);
            $em->flush();
            $succes = 1;
        } else {
            $succes = 3;
        }

        return new JsonResponse($succes);
    }

    /**
     * @Route("/modifierGroupe/", name="modifierGroupe")
     */
    public
    function modifierGroupe(Request $request)
    {

        $succes = "";
        $em = $this->getDoctrine()->getManager();
        $nom = $request->get('nom');
        $id = $request->get('idC');

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $groupeEnt = $em->getRepository('App:GroupeContact')->findOneByNom($nom);

        if ($nom != "") {
            $groupe = $em->getRepository('App:GroupeContact')->findOneById($id);
            if (!$groupeEnt) {
                $groupe->setNom($nom);

                $em->persist($groupe);
                $em->flush();
                $succes = 1;
            } else {
                $succes = 2;
            }
        } else {
            $succes = 3;
        }
        $jsonData = array(
            'succes' => $succes
        );
        return new JsonResponse($jsonData);
    }

    /**
     * @Route("/supprimerDuGroupe/", name="supprimerDuGroupe")
     */
    public
    function supprimerDuGroupe(Request $request)
    {

        $succes = "";

        $em = $this->getDoctrine()->getManager();

        $id = $request->get('iid2');

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $contact = $em->getRepository('App:Contact')->findOneById($id);
        $contact->setGroupe('Aucun');
        $contact->setIdGroupe(null);

        $em->persist($contact);
        $em->flush();
        $succes = "Opération effectuer avec succès";

        $jsonData = array(
            'succes' => $succes
        );
        return new JsonResponse($jsonData);
    }

    /**
     * @Route("/groupeContactDelete/{id}/", name="groupeContactDelete")
     */
    public
    function groupeContactDelete(Request $request, $id)
    {

        $succes = "";
        $em = $this->getDoctrine()->getManager();

        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $contact = $em->getRepository('App:GroupeContact')->findOneById($id);

        $em->remove($contact);
        $em->flush();
        $succes = "Opération effectuer avec succès";

        return $this->redirectToRoute('groupeContact');
    }
}
