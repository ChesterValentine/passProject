<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccueilRepository")
 */
class Accueil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePassage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $obtenu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ContenuVisiteur", inversedBy="accueil")
     */
    private $contenuVisiteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AccueilPrestataire", mappedBy="accueil")
     */
    private $accueilPrestataires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="accueils")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="accueils")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Test", inversedBy="accueils")
     */
    private $test;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReponseChoisi", mappedBy="accueil")
     */
    private $reponseChoisis;

    

    public function __construct()
    {
        $this->accueilPrestataires = new ArrayCollection();
        $this->reponseChoisis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePassage(): ?\DateTimeInterface
    {
        return $this->datePassage;
    }

    public function setDatePassage(?\DateTimeInterface $datePassage): self
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    public function getObtenu(): ?bool
    {
        return $this->obtenu;
    }

    public function setObtenu(?bool $obtenu): self
    {
        $this->obtenu = $obtenu;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

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

    /**
     * @return Collection|AccueilPrestataire[]
     */
    public function getAccueilPrestataires(): Collection
    {
        return $this->accueilPrestataires;
    }

    public function addAccueilPrestataire(AccueilPrestataire $accueilPrestataire): self
    {
        if (!$this->accueilPrestataires->contains($accueilPrestataire)) {
            $this->accueilPrestataires[] = $accueilPrestataire;
            $accueilPrestataire->addAccueil($this);
        }

        return $this;
    }

    public function removeAccueilPrestataire(AccueilPrestataire $accueilPrestataire): self
    {
        if ($this->accueilPrestataires->contains($accueilPrestataire)) {
            $this->accueilPrestataires->removeElement($accueilPrestataire);
            $accueilPrestataire->removeAccueil($this);
        }

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @return Collection|ReponseChoisi[]
     */
    public function getReponseChoisis(): Collection
    {
        return $this->reponseChoisis;
    }

    public function addReponseChoisi(ReponseChoisi $reponseChoisi): self
    {
        if (!$this->reponseChoisis->contains($reponseChoisi)) {
            $this->reponseChoisis[] = $reponseChoisi;
            $reponseChoisi->setAccueil($this);
        }

        return $this;
    }

    public function removeReponseChoisi(ReponseChoisi $reponseChoisi): self
    {
        if ($this->reponseChoisis->contains($reponseChoisi)) {
            $this->reponseChoisis->removeElement($reponseChoisi);
            // set the owning side to null (unless already changed)
            if ($reponseChoisi->getAccueil() === $this) {
                $reponseChoisi->setAccueil(null);
            }
        }

        return $this;
    }
}
