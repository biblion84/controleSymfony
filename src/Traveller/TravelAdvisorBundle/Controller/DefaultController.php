<?php

namespace Traveller\TravelAdvisorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Traveller\TravelAdvisorBundle\Entity\Membre;
use Traveller\TravelAdvisorBundle\Form\loginForm;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TravellerTravelAdvisorBundle:Default:index.html.twig');
    }

    public function voyageAction()
    {
        return $this->render('TravellerTravelAdvisorBundle:Default:voyage.html.twig');
    }

    public function voyagePrenomAction($votrePrenom)
    {
        if ($votrePrenom == "votrePrenom")
            return $this->render('TravellerTravelAdvisorBundle:Default:voyage.html.twig');
        return $this->render('TravellerTravelAdvisorBundle:Default:voyagePrenom.html.twig',
            array(
                'nomPrenom' => $votrePrenom
            ));
    }

    public function loginAction(Request $request)
    {
        if (!$request->get('mail') || !$request->get('mdp'))
            return $this->redirectToRoute('traveller_travel_advisor_connection');
        else {
            $repository = $this->getDoctrine()->getRepository('TravellerTravelAdvisorBundle:Membre');
            $membre = $repository->findOneByMail($request->get('mail'));
            if ($membre) {
                if ($request->get('password') == $membre->getMdp()) {
                    $request->getSession()->getFlashBag()
                        ->add('blogger-notice', 'connexion réussie');
                } else {
                    $request->getSession()->getFlashBag()
                        ->add('blogger-notice', 'Mauvais mdp');
                }
            } else {
                $request->getSession()->getFlashBag()
                    ->add('blogger-notice', "Mail n'existe pas, oui c'est une faille de sécurité de le dire mais on est gentil c'est un controle");
            }
        }
        return $this->redirectToRoute('traveller_travel_advisor_connection');
    }

    public function connectionAction()
    {
        $membre = new Membre();
        $form = $this->get('form.factory')
            ->create(loginForm::class, $membre);
//                array(
//                    'action' => '/login',
//                    'method' => 'POST'));
        return $this->render("TravellerTravelAdvisorBundle:Default:formulaire.html.twig",
            array(
                'form' => $form->createView()
            ));


    }
    public function afficherAction($id){
        $repository = $this->getDoctrine()->getRepository('TravellerTravelAdvisorBundle:Membre');

        $membre = $repository->findOneById($id);
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $membre = $serializer->serialize($membre, 'json');
        return new Response((string)$membre);
    }
}

