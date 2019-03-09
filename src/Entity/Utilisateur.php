<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motDePasse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $visiteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $prestataire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $entrepriseAccueil;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $prestataireDeclarant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="inscrits")
     */
    private $referent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="referent")
     */
    private $inscrits;

    public function __construct()
    {
        $this->inscrits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVisiteur(): ?bool
    {
        return $this->visiteur;
    }

    public function setVisiteur(?bool $visiteur): self
    {
        $this->visiteur = $visiteur;

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

    public function getEntrepriseAccueil(): ?bool
    {
        return $this->entrepriseAccueil;
    }

    public function setEntrepriseAccueil(?bool $entrepriseAccueil): self
    {
        $this->entrepriseAccueil = $entrepriseAccueil;

        return $this;
    }

    public function getPrestataireDeclarant(): ?bool
    {
        return $this->prestataireDeclarant;
    }

    public function setPrestataireDeclarant(?bool $prestataireDeclarant): self
    {
        $this->prestataireDeclarant = $prestataireDeclarant;

        return $this;
    }

    public function getReferent(): ?self
    {
        return $this->referent;
    }

    public function setReferent(?self $referent): self
    {
        $this->referent = $referent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getInscrits(): Collection
    {
        return $this->inscrits;
    }

    public function addInscrit(self $inscrit): self
    {
        if (!$this->inscrits->contains($inscrit)) {
            $this->inscrits[] = $inscrit;
            $inscrit->setReferent($this);
        }

        return $this;
    }

    public function removeInscrit(self $inscrit): self
    {
        if ($this->inscrits->contains($inscrit)) {
            $this->inscrits->removeElement($inscrit);
            // set the owning side to null (unless already changed)
            if ($inscrit->getReferent() === $this) {
                $inscrit->setReferent(null);
            }
        }

        return $this;
    }
}
