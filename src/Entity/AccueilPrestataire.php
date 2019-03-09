<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccueilPrestataireRepository")
 */
class AccueilPrestataire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Accueil", inversedBy="accueilPrestataires")
     */
    private $accueil;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Entreprise", mappedBy="contenuPrestataire", cascade={"persist", "remove"})
     */
    private $entreprise;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Test", mappedBy="contenuPrestataire", cascade={"persist", "remove"})
     */
    private $test;

    public function __construct()
    {
        $this->accueil = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * @return Collection|Accueil[]
     */
    public function getAccueil(): Collection
    {
        return $this->accueil;
    }

    public function addAccueil(Accueil $accueil): self
    {
        if (!$this->accueil->contains($accueil)) {
            $this->accueil[] = $accueil;
        }

        return $this;
    }

    public function removeAccueil(Accueil $accueil): self
    {
        if ($this->accueil->contains($accueil)) {
            $this->accueil->removeElement($accueil);
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

        // set (or unset) the owning side of the relation if necessary
        $newContenuPrestataire = $entreprise === null ? null : $this;
        if ($newContenuPrestataire !== $entreprise->getContenuPrestataire()) {
            $entreprise->setContenuPrestataire($newContenuPrestataire);
        }

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(Test $test): self
    {
        $this->test = $test;

        // set the owning side of the relation if necessary
        if ($this !== $test->getContenuPrestataire()) {
            $test->setContenuPrestataire($this);
        }

        return $this;
    }
}
