<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/visionner/{entreprise}/{type}", name="visionner")
     */
    public function visionner()
    {
        return $this->render('app/visionner.html.twig', [
            
        ]);
    }
}
