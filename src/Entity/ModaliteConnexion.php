<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModaliteConnexionRepository")
 */
class ModaliteConnexion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modeVisiteurLibre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modeVisiteurDeclare;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modePrestataireLibre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modePrestataireDeclare;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $modePrestataireEmployeur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $testPlateforme;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Entreprise", inversedBy="modaliteConnexion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeVisiteurLibre(): ?bool
    {
        return $this->modeVisiteurLibre;
    }

    public function setModeVisiteurLibre(?bool $modeVisiteurLibre): self
    {
        $this->modeVisiteurLibre = $modeVisiteurLibre;

        return $this;
    }

    public function getModeVisiteurDeclare(): ?bool
    {
        return $this->modeVisiteurDeclare;
    }

    public function setModeVisiteurDeclare(?bool $modeVisiteurDeclare): self
    {
        $this->modeVisiteurDeclare = $modeVisiteurDeclare;

        return $this;
    }

    public function getModePrestataireLibre(): ?bool
    {
        return $this->modePrestataireLibre;
    }

    public function setModePrestataireLibre(?bool $modePrestataireLibre): self
    {
        $this->modePrestataireLibre = $modePrestataireLibre;

        return $this;
    }

    public function getModePrestataireDeclare(): ?bool
    {
        return $this->modePrestataireDeclare;
    }

    public function setModePrestataireDeclare(?bool $modePrestataireDeclare): self
    {
        $this->modePrestataireDeclare = $modePrestataireDeclare;

        return $this;
    }

    public function getModePrestataireEmployeur(): ?bool
    {
        return $this->modePrestataireEmployeur;
    }

    public function setModePrestataireEmployeur(?bool $modePrestataireEmployeur): self
    {
        $this->modePrestataireEmployeur = $modePrestataireEmployeur;

        return $this;
    }

    public function getTestPlateforme(): ?bool
    {
        return $this->testPlateforme;
    }

    public function setTestPlateforme(?bool $testPlateforme): self
    {
        $this->testPlateforme = $testPlateforme;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
