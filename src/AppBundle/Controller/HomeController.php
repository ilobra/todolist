<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="homepage")
     */
    public function indexAction()
    {

        $repository = $this->getDoctrine()->getRepository('AppBundle:Users');
        $user = $repository->findOneBy([
           'id'=> '6'
        ]);
        dump($user);


        return $this->render('homepage/homepage.html.twig',  [ 'userData' => $user ]);

    }
    /**
     * @Route("/home/{id}", name="homepageUser")
     */
    public function userHomepage($id)
    {

        return $this->render('homepage/homepage.html.twig', array());

    }
}
