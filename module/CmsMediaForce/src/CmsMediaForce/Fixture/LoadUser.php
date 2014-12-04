<?php

namespace CmsMediaForce\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CmsMediaForce\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $visitante = $manager->getReference('CmsMediaForce\Entity\Role',1);
        $corretor = $manager->getReference('CmsMediaForce\Entity\Role',2);

        $admin = $manager->getReference('CmsMediaForce\Entity\Role',3);

        $user = new User;

        $user->setNome("adminCases")
                ->setEmail("adminCases@teste.com")
                ->setPassword("Cases@2014")
                ->setRole($visitante);

        $manager->persist($user);       
        
        $manager->flush();
        
    }

    public function getOrder() {
        return 2;
    }
}
