<?php

namespace ReceptionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReceptionBundle:Default:index.html.twig');
    }
}
