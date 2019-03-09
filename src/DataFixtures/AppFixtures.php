<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Utilisateur;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $utilisateur = new Utilisateur();
        for ($i = 0; $i < 10; $i++) {
            
        }
        // $product = new Product();
        // $manager->persist($product);

        //$manager->flush();
    }
}
