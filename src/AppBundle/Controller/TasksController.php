<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categories;
use AppBundle\Entity\Tasks;
use AppBundle\Entity\Teams;
use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


/**
 * Task controller.
 *
 * @Route("home/tasks")
 */
class TasksController extends Controller
{
    /**
     * Finds and displays a teams project
     *
     * @Route("/user={id}/project", name="teams_project")
     * @Method("GET")
     */
    public function showAllAction(Users $userid)
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
        return $this->render('tasks/chooseProject.html.twig', array(
            'userteams' => $userteams
        ));
    }
    /**
     * Greeting
     *
     * @Route("/team={id}", name="tasks_greeting")
     * @Method("GET")
     */
    public function greetAction(Teams $teams)
    {
        $teamname = $teams->getTeamname();
        $this->addFlash('info', 'Welcome to "'.$teamname.'" teams project!');

        return $this->redirectToRoute('tasks_index', [ 'id' => $teams->getId()]);
    }

    /**
     * Lists all task entities.
     *
     * @Route("/team={id}/project", name="tasks_index")
     * @Method("GET")
     */
    public function indexAction(Teams $teams)
    {
        $tasks = $teams->getTeamtasks();

        return $this->render('tasks/index.html.twig', array(
            'tasks' => $tasks,
            'team' => $teams
        ));
    }

    /**
     * Creates a new task entity.
     *
     * @Route("/team={id}/newtask", name="tasks_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Teams $teams)
    {
        $task = new Tasks();
        $author = $this->get('security.token_storage')->getToken()->getUser();
        $teamid = $teams->getId();

        $task->setAuthor($author);
        $task->setTeam($teams);

        $form = $this->createForm('AppBundle\Form\TasksType', $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('tasks_show', array('team' => $teams));
        }

        return $this->render('tasks/new.html.twig', array(
            'task' => $task,
            'author' => $author,
            'team' => $teams,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a task entity.
     *
     * @Route("/{id}", name="tasks_show")
     * @Method("GET")
     */
    public function showAction(Tasks $task)
    {
        $deleteForm = $this->createDeleteForm($task);
        $author = $task->getAuthor();
        $category =$task->getCategory();
        return $this->render('tasks/show.html.twig', array(
            'task' => $task,
            'author'=>$author,
            'category' => $category,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing task entity.
     *
     * @Route("/{id}/edit", name="tasks_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tasks $task)
    {
        $deleteForm = $this->createDeleteForm($task);
        $editForm = $this->createForm('AppBundle\Form\TasksType', $task);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tasks_edit', array('id' => $task->getId()));
        }

        return $this->render('tasks/edit.html.twig', array(
            'task' => $task,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a task entity.
     *
     * @Route("/{id}", name="tasks_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tasks $task)
    {
        $form = $this->createDeleteForm($task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($task);
            $em->flush();
        }

        return $this->redirectToRoute('tasks_index');
    }

    /**
     * Creates a form to delete a task entity.
     *
     * @param Tasks $task The task entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tasks $task)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tasks_delete', array('id' => $task->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
