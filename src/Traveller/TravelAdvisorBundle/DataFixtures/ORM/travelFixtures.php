<?php
namespace Traveller\TravelAdvisorBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Traveller\TravelAdvisorBundle\Entity\Membre;

/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02/05/2017
 * Time: 14:49
 */
class travelFixtures implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $membre = new Membre();
        $membre->setNom("Roger");
        $membre->setMail("Roger@dotmail.com");
        $membre->setMdp("hunter");
        $membre->setPrenom("thierry");
        $membre->setCreated(new \DateTime());
        $manager->persist($membre);
        $manager->flush();

        $membre = new Membre();
        $membre->setNom("titi");
        $membre->setMail("titi@dotmail.com");
        $membre->setMdp("toto");
        $membre->setPrenom("ouuu");
        $membre->setCreated(new \DateTime());
        $manager->persist($membre);
        $manager->flush();

    }
}