<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SuperadminRepository")
 */
class Superadmin
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adminpartenaire", mappedBy="superadmin")
     */
    private $adminpartenaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comptebank", mappedBy="adminsystem")
     */
    private $comptebanks;

    public function __construct()
    {
        $this->adminpartenaires = new ArrayCollection();
        $this->comptebanks = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Adminpartenaire[]
     */
    public function getAdminpartenaires(): Collection
    {
        return $this->adminpartenaires;
    }

    public function addAdminpartenaire(Adminpartenaire $adminpartenaire): self
    {
        if (!$this->adminpartenaires->contains($adminpartenaire)) {
            $this->adminpartenaires[] = $adminpartenaire;
            $adminpartenaire->setSuperadmin($this);
        }

        return $this;
    }

    public function removeAdminpartenaire(Adminpartenaire $adminpartenaire): self
    {
        if ($this->adminpartenaires->contains($adminpartenaire)) {
            $this->adminpartenaires->removeElement($adminpartenaire);
            // set the owning side to null (unless already changed)
            if ($adminpartenaire->getSuperadmin() === $this) {
                $adminpartenaire->setSuperadmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comptebank[]
     */
    public function getComptebanks(): Collection
    {
        return $this->comptebanks;
    }

    public function addComptebank(Comptebank $comptebank): self
    {
        if (!$this->comptebanks->contains($comptebank)) {
            $this->comptebanks[] = $comptebank;
            $comptebank->setAdminsystem($this);
        }

        return $this;
    }

    public function removeComptebank(Comptebank $comptebank): self
    {
        if ($this->comptebanks->contains($comptebank)) {
            $this->comptebanks->removeElement($comptebank);
            // set the owning side to null (unless already changed)
            if ($comptebank->getAdminsystem() === $this) {
                $comptebank->setAdminsystem(null);
            }
        }

        return $this;
    }
}
