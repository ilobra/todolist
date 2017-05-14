<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use AppBundle\Form\MemberType;
use AppBundle\Form\UserType;
use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Session\Session;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="registration")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function registerAction(Request $request)
    {
        // 1) build the form
        $user = new Users();
        $form = $this->createForm(UserType::class, $user, [

        ]);

//        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
//
        if ($form->isSubmitted() && $form->isValid()) {
//
//            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this
                ->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
//
            $user->setPassword($password);
//
//            //$user->setRole('ROLE_USER');
//
//            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

//            $token = new UsernamePasswordToken(
//                $member,
//                $password,
//                'main',
//                $member->getRoles()
//            );
//
//            $this->get('security.token_storage')->setToken($token);
//            $this->get('session')->set('_security_main', serialize($token));

            $this->addFlash('success', 'Successfully registered!');
//
            return $this->redirectToRoute('login');
        }

        return $this->render('registration/register.html.twig',
            ['register_form' => $form->createView()]
        );
    }
}
