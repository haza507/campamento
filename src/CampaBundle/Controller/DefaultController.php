<?php

namespace CampaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CampaBundle:Default:index.html.twig');
    }
}
