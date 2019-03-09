<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonSociale;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $accueil;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $prestataire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="entreprise")
     */
    private $salarie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", mappedBy="entrepriseDaccueil")
     */
    private $visiteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entreprise", inversedBy="entreprisesAutorisantDeclaration")
     */
    private $declarant;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entreprise", mappedBy="declarant")
     */
    private $entreprisesAutorisantDeclaration;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ModaliteConnexion", mappedBy="entreprise", cascade={"persist", "remove"})
     */
    private $modaliteConnexion;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ContenuVisiteur", inversedBy="entreprise", cascade={"persist", "remove"})
     */
    private $contenuVisiteur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AccueilPrestataire", inversedBy="entreprise", cascade={"persist", "remove"})
     */
    private $contenuPrestataire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Accueil", mappedBy="entreprise", orphanRemoval=true)
     */
    private $accueils;

    public function __construct()
    {
        $this->salarie = new ArrayCollection();
        $this->visiteur = new ArrayCollection();
        $this->declarant = new ArrayCollection();
        $this->entreprisesAutorisantDeclaration = new ArrayCollection();
        $this->accueils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getAccueil(): ?bool
    {
        return $this->accueil;
    }

    public function setAccueil(?bool $accueil): self
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getPrestataire(): ?bool
    {
        return $this->prestataire;
    }

    public function setPrestataire(?bool $prestataire): self
    {
        $this->prestataire = $prestataire;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getSalarie(): Collection
    {
        return $this->salarie;
    }

    public function addSalarie(Utilisateur $salarie): self
    {
        if (!$this->salarie->contains($salarie)) {
            $this->salarie[] = $salarie;
            $salarie->setEntreprise($this);
        }

        return $this;
    }

    public function removeSalarie(Utilisateur $salarie): self
    {
        if ($this->salarie->contains($salarie)) {
            $this->salarie->removeElement($salarie);
            // set the owning side to null (unless already changed)
            if ($salarie->getEntreprise() === $this) {
                $salarie->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getVisiteur(): Collection
    {
        return $this->visiteur;
    }

    public function addVisiteur(Utilisateur $visiteur): self
    {
        if (!$this->visiteur->contains($visiteur)) {
            $this->visiteur[] = $visiteur;
            $visiteur->addEntrepriseDaccueil($this);
        }

        return $this;
    }

    public function removeVisiteur(Utilisateur $visiteur): self
    {
        if ($this->visiteur->contains($visiteur)) {
            $this->visiteur->removeElement($visiteur);
            $visiteur->removeEntrepriseDaccueil($this);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getDeclarant(): Collection
    {
        return $this->declarant;
    }

    public function addDeclarant(self $declarant): self
    {
        if (!$this->declarant->contains($declarant)) {
            $this->declarant[] = $declarant;
        }

        return $this;
    }

    public function removeDeclarant(self $declarant): self
    {
        if ($this->declarant->contains($declarant)) {
            $this->declarant->removeElement($declarant);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEntreprisesAutorisantDeclaration(): Collection
    {
        return $this->entreprisesAutorisantDeclaration;
    }

    public function addEntreprisesAutorisantDeclaration(self $entreprisesAutorisantDeclaration): self
    {
        if (!$this->entreprisesAutorisantDeclaration->contains($entreprisesAutorisantDeclaration)) {
            $this->entreprisesAutorisantDeclaration[] = $entreprisesAutorisantDeclaration;
            $entreprisesAutorisantDeclaration->addDeclarant($this);
        }

        return $this;
    }

    public function removeEntreprisesAutorisantDeclaration(self $entreprisesAutorisantDeclaration): self
    {
        if ($this->entreprisesAutorisantDeclaration->contains($entreprisesAutorisantDeclaration)) {
            $this->entreprisesAutorisantDeclaration->removeElement($entreprisesAutorisantDeclaration);
            $entreprisesAutorisantDeclaration->removeDeclarant($this);
        }

        return $this;
    }

    public function getModaliteConnexion(): ?ModaliteConnexion
    {
        return $this->modaliteConnexion;
    }

    public function setModaliteConnexion(ModaliteConnexion $modaliteConnexion): self
    {
        $this->modaliteConnexion = $modaliteConnexion;

        // set the owning side of the relation if necessary
        if ($this !== $modaliteConnexion->getEntreprise()) {
            $modaliteConnexion->setEntreprise($this);
        }

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

    public function getContenuPrestataire(): ?AccueilPrestataire
    {
        return $this->contenuPrestataire;
    }

    public function setContenuPrestataire(?AccueilPrestataire $contenuPrestataire): self
    {
        $this->contenuPrestataire = $contenuPrestataire;

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
            $accueil->setEntreprise($this);
        }

        return $this;
    }

    public function removeAccueil(Accueil $accueil): self
    {
        if ($this->accueils->contains($accueil)) {
            $this->accueils->removeElement($accueil);
            // set the owning side to null (unless already changed)
            if ($accueil->getEntreprise() === $this) {
                $accueil->setEntreprise(null);
            }
        }

        return $this;
    }
}
