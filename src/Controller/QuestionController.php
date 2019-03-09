<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\Test;
use App\Repository\QuestionRepository;
use function Sodium\add;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="question")
     */
    public function index()
    {
        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
        ]);
    }


    /**
     * @Route("test/{idTest}", name="test")
     * @param int $idTest
     * @return Response
     */
    public function listeQuestion(int $idTest)
    {
        $test = $this->getDoctrine()
            ->getRepository(Test::class)
            ->find($idTest);

        return $this->render('question/index.html.twig', [
            'controller_name' => 'QuestionController',
            'questions' => $test->getQuestions()

        ]);
        return new Response($test->getQuestions()[1]->getIntitule());


        /*
        $questions = $this->getDoctrine()
            ->getRepository(Question::class)
            ->findBy(array("test"=> $idTest));

        return new Response('intitulé: ');
        */
    }


    /**
     * @Route("question/{idQuestion}", name="question")
     * @param int $idQuestion
     * @return Response
     */
    public function Question(int $idQuestion)
    {


        $repo = $this->getDoctrine()
            ->getRepository(Question::class);
        $question = $repo->FindOneById($idQuestion);


        var_dump($question);
        return new Response('intitulé: '.$question->GetIntitule());
    }
}
