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
        $em=$this->getDoctrine()->getManager();
        $id = $userid->getId();

        $connection =$this->get('database_connection');
      //  $user = $em->createQuery('SELECT u.username, u.name, u.lastname, u.email FROM AppBundle/Entity/Users as u WHERE u.id = ?1')->setParameters(1,$id)->getResult();
       // $user=$connection->createQueryBuilder()->select('u.username', 'u.name', 'u.lastname', 'u.email')->from('users', 'u')->where('u.id = ?1')->setParameter(1, '$id');
                $user = $connection->fetchAll(
            'SELECT u.username, u.name, u.lastname, u.email
              FROM users as u
              WHERE u.id = ?
              ', [$id]
        );
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

        $usertasks=$connection->fetchAll('SELECT task.taskname, task.id
                                                FROM tasks as task, users as usr
                                                WHERE task.authorUser_id = usr.id AND usr.id=?', [$id]);
        return $this->render('homepage/homepage.html.twig', array(
            'usersteams' => $userteams,
            'usertasks' => $usertasks,
            'user' => $user,
        ));

    }
}