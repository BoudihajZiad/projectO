<?php

namespace App\Controller;

use App\Entity\MessageSimple;
use App\Entity\MessageVariable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message/messageSimple", name="messageSimple")
     */
    public function messageSimple(): Response
    {
        $session = new Session();
        $id = $session->get('user');
        $idd = $id->getId();

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:MessageSimple')->findByIdUser($idd);

        return $this->render('message/messageSimple.html.twig', array('contacts' => $contact,'id'=>$idd));
    }

    /**
     * @Route("/message/ajouterMessage", name="ajouterMessage")
     */
    public function ajouterMessage(Request $request): Response
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);

        return $this->render('message/ajouterMessage.html.twig', array("contact"=>$UserEntity));
    }

    /**
     * @Route("/addMessage/", name="addMessage")
     */
    public function addMessage(Request $request): Response
    {
        $response = "";
        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $langue = $request->get('langue');
        $msg = $request->get('message1');

        $session = new Session();
        if (!$session->get( 'user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);

        if ($nom != "") {
            $testEnt = $em->getRepository('App:MessageSimple')->findOneBy(array('nom'=>$nom,'idUser'=>$UserEntity));
            if (!$testEnt) {
                $MessageSimple = new MessageSimple();
                $MessageSimple->setNom($nom)
                    ->setLangue($langue)
                    ->setMessage($msg)
                    ->setType("texte/Unicode")
                    ->setIdUser($UserEntity);

                $em->persist($MessageSimple);
                $em->flush();
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        return new Response($response);
    }


    /**
     * @Route("/messageupdate/{id}/", name="messageupdate")
     */
    public function messageupdate(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $MessageSimple = $em->getRepository('App:MessageSimple')->findOneById($id);

        return $this->render("/message/messageUpdate.html.twig", array("message" => $MessageSimple));
    }

    /**
     * @Route("messagemodifier/{id}/", name="messagemodifier")
     */
    public function messagemodifier(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();

        $response = "";

        $nom = $request->get('nom');
        $langue = $request->get('langue');
        $msg = $request->get('message1');

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);
        $MessageTest = $em->getRepository('App:MessageSimple')->findOneById($id);


        if ($nom != "") {
            $testEnt = $em->getRepository('App:MessageSimple')->findOneBy(array('nom'=>$nom,'idUser'=>$UserEntity));
            if (!$testEnt) {
                $MessageTest->setNom($nom)
                    ->setLangue($langue)
                    ->setMessage($msg)
                    ->setType("texte/Unicode")
                    ->setIdUser($UserEntity);

                $em->persist($MessageTest);
                $em->flush();
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        return new Response($response);
    }

    /**
     * @Route("/messageDelete/{id}/", name="messageDelete")
     */
    public function messageDelete(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $MessageSimple = $em->getRepository('App:MessageSimple')->findOneById($id);

        $em->remove($MessageSimple);
        $em->flush();

        return new Response("GG");
    }

    /**
     * @Route("/message/messageVariable", name="messageVariable")
     */
    public function messageVariable(): Response
    {
        $session = new Session();
        $id = $session->get('user');
        $idd = $id->getId();

        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('App:MessageVariable')->findByIdUser($idd);

        return $this->render('message/messageVariable.html.twig', array('contacts' => $contact,'id'=>$idd));
    }

    /**
     * @Route("/message/ajouterMessageVar", name="ajouterMessageVar")
     */
    public function ajouterMessageVar(Request $request): Response
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);

        return $this->render('message/ajouterMessageVar.html.twig', array("contact"=>$UserEntity));
    }

    /**
     * @Route("/addMessageVar/", name="addMessageVar")
     */
    public function addMessageVar(Request $request): Response
    {
        $response = "";
        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $langue = $request->get('langue');
        $msg = $request->get('message1');

        $session = new Session();
        if (!$session->get( 'user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);

        if ($nom != "") {
            $testEnt = $em->getRepository('App:MessageVariable')->gg($nom,$UserEntity);
            if (!$testEnt) {
                $MessageVariable = new MessageVariable();
                $MessageVariable->setIdUser($UserEntity)
                    ->setNom($nom)
                    ->setLangue($langue)
                    ->setMessage($msg)
                    ->setType(null)
                    ->setNumLigne(1);

                $em->persist($MessageVariable);
                $em->flush();
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        return new Response($response);
    }


    /**
     * @Route("/messageVarupdate/{id}/", name="messageVarupdate")
     */
    public function messageVarupdate(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $MessageVariable = $em->getRepository('App:MessageVariable')->findOneById($id);

        return $this->render("/message/messageVarupdate.html.twig", array("message" => $MessageVariable));
    }

    /**
     * @Route("messageVarmodifier/{id}/", name="messageVarmodifier")
     */
    public function messageVarmodifier(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();

        $response = "";

        $nom = $request->get('nom');
        $langue = $request->get('langue');
        $msg = $request->get('message1');

        $em = $this->getDoctrine()->getManager();
        $leid = $session->get('user')->getId();
        $UserEntity = $em->getRepository('App:client')->findOneById($leid);
        $MessageTest = $em->getRepository('App:MessageVariable')->findOneById($id);


        if ($nom != "") {
            $testEnt = $em->getRepository('App:MessageVariable')->gg($nom,$UserEntity);
            if ($testEnt) {
                $MessageTest->setLangue($langue)
                    ->setMessage($msg)
                    ->setType("texte/Unicode")
                    ->setIdUser($UserEntity)
                    ->setType(null)
                    ->setNumLigne(1);

                $em->persist($MessageTest);
                $em->flush();
                $response = 1;
            } else {
                $response = 2;
            }
        } else {
            $response = 3;
        }
        return new Response($response);
    }

    /**
     * @Route("/messageVarDelete/{id}/", name="messageVarDelete")
     */
    public function messageVarDelete(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $MessageVariable = $em->getRepository('App:MessageVariable')->findOneById($id);

        $em->remove($MessageVariable);
        $em->flush();

        return new Response("GG");
    }
}
