<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function login(Request $request): Response
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $response = "";

        $email = $request->request->get('email');
        $password = $request->request->get('password');

        if ($request->getMethod() == "POST") {
            if ($email != "" && $password != "") {
                $mailBase = $em->getRepository('App:Client')->findOneBy(array("idConnexion" => $email, "password" => sha1($password)));
                if ($mailBase) {
                    $session->set('user', $mailBase);
                    $session->set('connect', 'OK');
                    return $this->redirectToRoute("index");
                } else {
                    $response = "Email ou mot de passe incorrect";
                }
            } else {
                $response = "Email ou mot de passe vide";
            }
        }
        return $this->render('login.html.twig', array("response" => $response, "idConnexion" => $email));
    }

    /**
     * @Route("/index", name="index")
     */
    public
    function index(): Response
    {
        $session = new Session();
        if (!$session->get('user') || $session->get('connect') != 'OK') {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        return $this->render('index.html.twig');
    }

    /**
     * @Route("/profile/{id}/", name="profile")
     */
    public
    function profile(Request $request, $id): Response
    {
        $session = new Session();
        if (!$session->get('user') || $session->get('connect') != 'OK') {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('App:Client')->findOneById($id);

        return $this->render('profile.html.twig', array('clients' => $client, 'succes' => '', 'response' => ''));
    }

    /**
     * @Route("/modifierInfo/{id}/", name="modifierInfo")
     */
    public
    function modifier(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $response = "";
        $succes = "";

        $em = $this->getDoctrine()->getManager();

        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $email = $request->get('email');
        $telephone = $request->get('telephone');
        $cnx = $request->get('cnx');
        $url = $request->get('url');
        $canal = $request->get('canal');
        $alert = $request->get('alert');
        $langue = $request->get('langue');
        $prefix = substr($telephone, 0, 3);

        if ($nom != "" && $telephone != "" && $email != "" && $prenom != "") {
            if (strlen($telephone) == 12) {
                if ($prefix == "212") {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $mailCheck = $em->getRepository('App:Client')->findOneByEmail($email);
                        if (!$mailCheck) {
                            $client = $em->getRepository('App:Client')->findOneById($id);
                            $client->setNom($nom)
                                ->setPrenom($prenom)
                                ->setEmail($email)
                                ->setTel($telephone)
                                ->setUrlDelivery($url)
                                ->setCanalPrefere($canal)
                                ->setAlerteStatut($alert)
                                ->setLanguePrefere($langue);

                            $em->persist($client);
                            $em->flush();
                            $response = 1;

                        } else {
                            $response = 2;
                        }
                    } else {
                        $response = 3;
                    }
                } else {
                    $response = 4;//"Téléphone doit contenir 212 au debut!";
                }
            } else {
                $response = 5;//"Téléphone doit contenir 12 chiffres!";
            }
        } else {
            $response = 6;//"Champ obligatoire!";
        }

        $jsonData = array(
            'succes' => $succes,
            'response' => $response
        );
        return new JsonResponse($jsonData);
    }

    /**
     * @Route("/modifierPass/{id}/", name="modifierPass")
     */
    public
    function modifierPass(Request $request, $id)
    {
        $session = new Session();
        if (!$session->get('user')) {
            $session->set('connect', 'NOT OK');
            return $this->redirectToRoute("login");
        }

        $response = "";
        $succes = "";

        $em = $this->getDoctrine()->getManager();

        $Ancpass = $request->get('ancMdp');
        $pass = $request->get('mdp');
        $cnfMdp = $request->get('confmdp');

        if ($pass != "" && $cnfMdp != "" && $Ancpass != "") {
            $clientTest = $em->getRepository('App:Client')->findOneById($id);
            $mdpTest = $clientTest->getPassword();
            if (strlen($Ancpass) > 7 && strlen($pass) > 7 && strlen($cnfMdp) > 7) {
                if (sha1($Ancpass) === $mdpTest) {
                    if ($pass == $cnfMdp) {
                        $client = $em->getRepository('App:Client')->findOneById($id);
                        $client->setPassword(sha1($pass));

                        $em->persist($client);
                        $em->flush();

                        $session->set('user', $client);
                        $response = 1;
                    } else {
                        $response = 2;
                    }
                } else {
                    $response = 3;
                }
            } else {
                $response = 4;
            }
        } else {
            $response = 5;
        }

        $jsonData = array(
            'nice' => $succes,
            'bad' => $response
        );
        return new JsonResponse($jsonData);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public
    function logout()
    {
        $session = new Session();
        $session->set('connect', 'NOT OK');
        $session->set('user', '');

        return $this->redirectToRoute("login");
    }
}
