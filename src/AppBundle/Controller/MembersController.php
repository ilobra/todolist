<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Teams;
use AppBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
/**
 * Member controller.
 *
 * @Route("members")
 */
class MembersController extends Controller
{
    /**
     * Lists all member entities.
     *
     * @Route("/", name="members_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('AppBundle:Users')->findAll();
        return $this->render('members/index.html.twig', array(
            'members' => $members,
        ));
    }

    /**
     * Finds and displays a member entity.
     *
     * @Route("/{id}", name="members_show")
     * @Method("GET")
     */
    public function showAction(Users $member, Users $userid  )
    {
        $user=$this->getDoctrine()->getRepository('AppBundle:Users')->find($userid);
        //$teams= $this->getDoctrine()->getRepository('AppBundle:Users')->find($userid);


        return $this->render('members/show.html.twig', array(
            'member' => $member,
            'user' => $user,
            //'teams' => $teams,
        ));
    }
}