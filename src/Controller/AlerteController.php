<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class AlerteController extends AbstractController
{
    /**
     * @Route("/alerte/", name="alerte")
     */
    public function index(): Response
    {
        $session = new Session();
        $id = $session->get('user');
        $idd = $id->getId();

        $em = $this->getDoctrine()->getManager();

        $alerteEntity = $em->getRepository('App:Alerte')->findByIdUser($idd);
        return $this->render('alerte/alerte.html.twig', array('contacts' => $alerteEntity,'id'=>$idd));
    }


    /**
     * @Route("/liremsg/{id}/", name="liremsg")
     */
    public function liremsg(Response $response, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $alerteEntity = $em->getRepository('App:Alerte')->findOneById($id);

        $alerteEntity->setStatut('lu');

        $em->persist($alerteEntity);
        $em->flush();

        return new Response('OK');
    }


}
