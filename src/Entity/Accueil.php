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

    public function __construct()
    {
        $this->accueilPrestataires = new ArrayCollection();
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
}
