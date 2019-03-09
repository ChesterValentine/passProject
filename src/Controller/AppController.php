<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Accueil;

class AppController extends AbstractController
{

    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('app/accueil.html.twig', [
            
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription()
    {
        return $this->render('app/inscription.html.twig', [
            
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion()
    {
        return $this->render('app/connexion.html.twig', [
            
        ]);
    }

    /**
     * @Route("/visionner/{entreprise}/{type}", name="visionner")
     */
    public function visionner()
    {
        return $this->render('app/visionner.html.twig', [
            
        ]);
    }

    /**
     * @Route("/dashboard", name="app")
     */
    public function dashboard()
    {
        return $this->render('app/dashboard.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
