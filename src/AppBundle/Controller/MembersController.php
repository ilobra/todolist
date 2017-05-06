<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Members;
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

        $members = $em->getRepository('AppBundle:Members')->findAll();
        $teams = $em->getRepository('AppBundle:Teams')->findAll();

        return $this->render('members/index.html.twig', array(
            'members' => $members,
            'teams' => $teams,

        ));
    }


    /**
     * Creates a new member entity.
     *
     * @Route("/new", name="members_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $member = new Members();
        $form = $this->createForm('AppBundle\Form\MembersType', $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();

            return $this->redirectToRoute('members_show', array('id' => $member->getId()));
        }

        return $this->render('members/new.html.twig', array(
            'member' => $member,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a member entity.
     *
     * @Route("/{id}", name="members_show")
     * @Method("GET")
     */
    public function showAction(Members $member, Users $userid)
    {
        $deleteForm = $this->createDeleteForm($member);
        $user=$this->getDoctrine()->getRepository('AppBundle:Users')->find($userid);
        return $this->render('members/show.html.twig', array(
            'member' => $member,
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing member entity.
     *
     * @Route("/{id}/edit", name="members_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Members $member)
    {
        $deleteForm = $this->createDeleteForm($member);
        $editForm = $this->createForm('AppBundle\Form\MembersType', $member);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('members_edit', array('id' => $member->getId()));
        }

        return $this->render('members/edit.html.twig', array(
            'member' => $member,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a member entity.
     *
     * @Route("/{id}", name="members_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Members $member)
    {
        $form = $this->createDeleteForm($member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($member);
            $em->flush();
        }

        return $this->redirectToRoute('members_index');
    }

    /**
     * Creates a form to delete a member entity.
     *
     * @param Members $member The member entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Members $member)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('members_delete', array('id' => $member->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
