<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContenuVisiteurRepository")
 */
class ContenuVisiteur
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
     * @ORM\OneToMany(targetEntity="App\Entity\Accueil", mappedBy="contenuVisiteur")
     */
    private $accueil;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Entreprise", mappedBy="contenuVisiteur", cascade={"persist", "remove"})
     */
    private $entreprise;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Test", mappedBy="contenuVisiteur", cascade={"persist", "remove"})
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
            $accueil->setContenuVisiteur($this);
        }

        return $this;
    }

    public function removeAccueil(Accueil $accueil): self
    {
        if ($this->accueil->contains($accueil)) {
            $this->accueil->removeElement($accueil);
            // set the owning side to null (unless already changed)
            if ($accueil->getContenuVisiteur() === $this) {
                $accueil->setContenuVisiteur(null);
            }
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
        $newContenuVisiteur = $entreprise === null ? null : $this;
        if ($newContenuVisiteur !== $entreprise->getContenuVisiteur()) {
            $entreprise->setContenuVisiteur($newContenuVisiteur);
        }

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;

        // set (or unset) the owning side of the relation if necessary
        $newContenuVisiteur = $test === null ? null : $this;
        if ($newContenuVisiteur !== $test->getContenuVisiteur()) {
            $test->setContenuVisiteur($newContenuVisiteur);
        }

        return $this;
    }
}
