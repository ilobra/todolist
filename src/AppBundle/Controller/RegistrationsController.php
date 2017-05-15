<?php

namespace AppBundle\Controller;

use AppBundle\Form\UsersType;
use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationsController extends Controller
{
    /**
     * @Route("/register", name="registration")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $user = new Users();

        $form = $this->createForm(UsersType::class, $user, [
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this
                ->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

//            $token = new UsernamePasswordToken(
//                $user,
//                $password,
//                'main',
//                $user->getRoles()
//            );
//
//            $this->get('security.token_storage')->setToken($token);
//            $this->get('session')->set('_security_main', serialize($token));

            $this->addFlash('success', 'Successfully registered!');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/register.html.twig',
            ['register_form' => $form->createView() ]);
    }
}
