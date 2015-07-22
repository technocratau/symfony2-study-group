<?php

namespace Technocrat\LMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TechnocratLMSBundle:Default:index.html.twig', array('name' => $name));
    }
}
