<?php

namespace Traveller\TravelAdvisorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TravellerTravelAdvisorBundle:Default:index.html.twig');
    }

    public function voyageAction(){
        return $this->render('TravellerTravelAdvisorBundle:Default:voyage.html.twig');
    }
}
