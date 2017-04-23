<?php

namespace AppBundle\Controller;

use AppBundle\Entity\users;
use AppBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends Controller
{

    /**
     * @Route("/login", name="login")
     **/
    public function loginAction(Request $request)
    {
        $user = new users();

        $authenticationUtils = $this->get('security.authentication_utils');

        $form = $this->createForm(LoginType::class, $user);
        $form->handleRequest($request);
        if($form->isValid()) {
            return $this->redirectToRoute('homepage');
        }
        // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
        'error'         => $error,
    ));

    }


    /*public function __invoke(Request $request) {
        $user = new users();
        $authenticationUtils = $this->get('security.authentication_utils');
        $form = $this->createForm(LoginType::class, $user);
        $form->handleRequest($request);

        if($form->isValid()) {
            return $this->redirectToRoute('about page');
        }

        // get the login error if there is one
        $error = $this->$authenticationUtils->getLastAuthenticationError();

        return  $this->render(
                'security/login.html.twig',
                array('form' => $form->createView(),
                    'error' => $error)
                );
    }*/
}
