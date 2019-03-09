<?php

namespace App\DataFixtures;

use App\Entity\Reponse;
use App\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Question extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $test = new Test();
        $test->setNoteminimumSucces(2);

        $question = new \App\Entity\Question();
        $question->setIntitule('combien fait 1+1 ?');
        $question->setTest($test);

        // create 4 products! Bam!
        for ($i = 0; $i < 4; $i++) {
            $reponse = new Reponse();
            $reponse->setIntitule( (string)$i);
            $r = ($i == 1) ? true : false;
            $reponse->setBonneReponse($r);
            $reponse->setQuestion($question);

            $manager->persist($reponse);
        }
        $manager->persist($question);


        $question = new \App\Entity\Question();
        $question->setIntitule('combien j\'ai de doigts ?');
        $question->setTest($test);

        for ($i = 3; $i < 6; $i++) {
            $reponse = new Reponse();
            $reponse->setIntitule( (string)$i);
            $r = ($i == 5) ? true : false;
            $reponse->setBonneReponse($r);
            $reponse->setQuestion($question);

            $manager->persist($reponse);
        }
        $manager->persist($question);
        $manager->persist($test);

        $manager->flush();
    }
}
