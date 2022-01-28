<?php


namespace App\Controller;

use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\GroupeContact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class GestionServiceController extends AbstractController
{

    /**
     * @Route("/gestionService/", name="gestionService")
     */
    public function gestionService(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('App:LabelService')->findAll();

        return $this->render("/gestion_service/gestionService.html.twig", array("services" => $service));
    }
}