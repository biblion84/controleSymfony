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

    public function voyagePrenomAction($votrePrenom){
        if ($votrePrenom == "votrePrenom")
            return $this->render('TravellerTravelAdvisorBundle:Default:voyage.html.twig');
        return $this->render('TravellerTravelAdvisorBundle:Default:voyagePrenom.html.twig',
            array(
            'nomPrenom' => $votrePrenom
        ));
    }
}
