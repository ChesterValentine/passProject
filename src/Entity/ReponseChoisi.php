<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseChoisiRepository")
 */
class ReponseChoisi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reponse")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reponse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Accueil", inversedBy="reponseChoisis")
     */
    private $accueil;

    

    public function __construct()
    {
        $this->reponse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|reponse
     */
    public function getReponse(): Collection
    {
        return $this->reponse;
    }

    public function addReponse(reponse $reponse): self
    {
        if (!$this->reponse->contains($reponse)) {
            $this->reponse[] = $reponse;
        }

        return $this;
    }

    public function removeReponse(reponse $reponse): self
    {
        if ($this->reponse->contains($reponse)) {
            $this->reponse->removeElement($reponse);
        }

        return $this;
    }

    public function setReponse(?Reponse $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getAccueil(): ?Accueil
    {
        return $this->accueil;
    }

    public function setAccueil(?Accueil $accueil): self
    {
        $this->accueil = $accueil;

        return $this;
    }
}
