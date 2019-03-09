<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Utilisateur;
use App\Entity\Entreprise;
use App\Entity\ModaliteConnexion;
use App\Entity\Accueil;
use App\Entity\ContenuVisiteur;
use App\Entity\AccueilPrestataire;
use App\Entity\Test;
use App\Entity\Question;
use App\Entity\Reponse;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $utilisateur = new Utilisateur();
        for ($i = 0; $i < 10; $i++) {
            $utilisateur->setNom($faker->lastName);
            $utilisateur->setPrenom($faker->firstName);
            $utilisateur->setLogin ($faker->username);
            $utilisateur->setMotDePasse($faker->password);
            $utilisateur->setEmail($faker->email);
            $utilisateur->setVisiteur($faker->boolean($chanceOfGettingTrue = 50));
            $utilisateur->setPrestataire($faker->boolean($chanceOfGettingTrue = 50));
            $utilisateur->setEntrepriseAccueil($faker->boolean($chanceOfGettingTrue = 50));
            $utilisateur->setPrestataireDeclarant($faker->boolean($chanceOfGettingTrue = 50));
            $manager->persist($utilisateur);
        }

        
        for ($i = 0; $i < 2; $i++) {
            $entreprise = new Entreprise();
            $entreprise->setRaisonSociale($faker->company);
            $entreprise->setPrestataire($faker->boolean($chanceOfGettingTrue = 50));
            $entreprise->setAccueil($faker->boolean($chanceOfGettingTrue = 50));
            $manager->persist($entreprise);

            $modaliteConnexion = new ModaliteConnexion();
            $modaliteConnexion->setModeVisiteurLibre($i%2 == 0 ? true : false);
            $modaliteConnexion->setModeVisiteurDeclare($i%2 != 0 ? true : false);
            $modaliteConnexion->setModePrestataireLibre($i%3 == 0 ? true : false);
            $modaliteConnexion->setModePrestataireDeclare($i%3 == 1 ? true : false);
            $modaliteConnexion->setModePrestataireEmployeur($i%3 == 2 ? true : false);
            $modaliteConnexion->setTestPlateforme($faker->boolean($chanceOfGettingTrue = 50));
            $modaliteConnexion->setEntreprise($entreprise);
            $manager->persist($modaliteConnexion);

            $accueil = new Accueil();
            $accueil->setDatePassage(null);
            $accueil->setObtenu($faker->boolean($chanceOfGettingTrue = 50));
            $accueil->setNote(mt_rand(10,20));
            $accueil->setEntreprise($entreprise);
            
            for ($j = 0; $j < 10; $j++) {
                $utilisateur = new Utilisateur();
                $utilisateur->setNom($faker->lastName);
                $utilisateur->setPrenom($faker->firstName);
                $utilisateur->setLogin ($faker->username);
                $utilisateur->setMotDePasse($faker->password);
                $utilisateur->setEmail($faker->email);
                $utilisateur->setVisiteur($faker->boolean($chanceOfGettingTrue = 50));
                $utilisateur->setPrestataire($faker->boolean($chanceOfGettingTrue = 50));
                $utilisateur->setEntrepriseAccueil($faker->boolean($chanceOfGettingTrue = 50));
                $utilisateur->setPrestataireDeclarant($faker->boolean($chanceOfGettingTrue = 50));
                $manager->persist($utilisateur);
                $accueil->setUtilisateur($utilisateur);
            }

            $manager->persist($accueil);
            
            
        }

        $contenuVisiteur = new ContenuVisiteur();
        for ($i = 0; $i < 10; $i++) {
            $contenuVisiteur->setFichier($faker->imageUrl($width = 640, $height = 480));
            $manager->persist($contenuVisiteur);
        }

        $accueilPrestataire = new AccueilPrestataire();
        for ($i = 0; $i < 10; $i++) {
            $accueilPrestataire->setFichier($faker->imageUrl($width = 640, $height = 480));
            $manager->persist($accueilPrestataire);
        }

        $test = new Test();
        for ($i = 0; $i < 10; $i++) {
            $test->setNoteMinimumSucces(mt_rand(  10, 12 ));
            $manager->persist($test);
            for ($k = 0; $k <10; $k++) {
                $question = new Question();
                $question->setIntitule($faker->sentence($nbWords = 6, $variableNbWords = true));
                $question->setIntitule(rtrim( $question->getIntitule(),'.')." ?");
                $question->setTest($test);
                $manager->persist($question);
                
                for ($j = 0; $j < 2; $j++) {
                    $reponse = new Reponse();
                    $reponse->setIntitule($faker->sentence($nbWords = 6, $variableNbWords = true));
                    $reponse->setBonneReponse($j%2 != 0 ? true : false);
                    $reponse->setQuestion($question);
                    $manager->persist($reponse);
                }
            }
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
