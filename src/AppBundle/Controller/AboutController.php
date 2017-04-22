<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about page")
     */
    public function description()
    {
        return new Response(
            '<html><body>Very beginning of todo list project.</body></html>'
        );
    }
}
   /* public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }*/
//}
