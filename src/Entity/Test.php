<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteminimumSucces;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="test", orphanRemoval=true)
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accueil", mappedBy="test")
     */
    private $accueils;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AccueilPrestataire", inversedBy="test", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $contenuPrestataire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ContenuVisiteur", inversedBy="test", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $contenuVisiteur;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->accueils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteminimumSucces(): ?int
    {
        return $this->noteminimumSucces;
    }

    public function setNoteminimumSucces(int $noteminimumSucces): self
    {
        $this->noteminimumSucces = $noteminimumSucces;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setTest($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getTest() === $this) {
                $question->setTest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Accueil[]
     */
    public function getAccueils(): Collection
    {
        return $this->accueils;
    }

    public function addAccueil(Accueil $accueil): self
    {
        if (!$this->accueils->contains($accueil)) {
            $this->accueils[] = $accueil;
            $accueil->setTest($this);
        }

        return $this;
    }

    public function removeAccueil(Accueil $accueil): self
    {
        if ($this->accueils->contains($accueil)) {
            $this->accueils->removeElement($accueil);
            // set the owning side to null (unless already changed)
            if ($accueil->getTest() === $this) {
                $accueil->setTest(null);
            }
        }

        return $this;
    }

    public function getContenuPrestataire(): ?AccueilPrestataire
    {
        return $this->contenuPrestataire;
    }

    public function setContenuPrestataire(AccueilPrestataire $contenuPrestataire): self
    {
        $this->contenuPrestataire = $contenuPrestataire;

        return $this;
    }

    public function getContenuVisiteur(): ?ContenuVisiteur
    {
        return $this->contenuVisiteur;
    }

    public function setContenuVisiteur(?ContenuVisiteur $contenuVisiteur): self
    {
        $this->contenuVisiteur = $contenuVisiteur;

        return $this;
    }
}
