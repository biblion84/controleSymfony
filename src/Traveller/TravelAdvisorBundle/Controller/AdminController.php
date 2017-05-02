<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02/05/2017
 * Time: 14:15
 */

namespace Traveller\TravelAdvisorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction(){
        return $this->render('TravellerTravelAdvisorBundle:Default:admin.html.twig');
    }

    public function redirectAction(){
        return $this->redirectToRoute('traveller_travel_advisor_voyage_prenom' ,array('votrePrenom' => 'visiteur'));
    }
}