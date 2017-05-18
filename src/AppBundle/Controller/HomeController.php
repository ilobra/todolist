<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use AppBundle\Entity\UsersTeams;
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
        $userid = $this->getUser()->getId();
        return $this->redirectToRoute('homepageUser', [ 'id' => $userid ]);
    }

    /**
     * @Route("/home/user={id}", name="homepageUser")
     */
    public function userHomepage(Users $userid)
    {
        $id = $userid->getId();
        $connection =$this->get('database_connection');
        $userteams = $connection->fetchAll(
            'SELECT t.teamname, t.id, ut.id as uit
              FROM usersteams as ut, teams as t
              WHERE ut.teams_id = t.id
              AND ut.user_id = ?
              Order BY t.id DESC ', [$id]
        );

        dump($userteams);
//        $repository = $this->getDoctrine()->getRepository('AppBundle:Teams');
//        $teams = $repository->findBy([
//            'id'=> 6
//        ]);

        return $this->render('homepage/homepage.html.twig', array(
            'usersteams' => $userteams,
        ));

    }
}