<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AdminpartenaireRepository")
 */
class Adminpartenaire
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
     * @ORM\ManyToOne(targetEntity="App\Entity\superadmin", inversedBy="adminpartenaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $superadmin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Userspartenaire", mappedBy="adminpartenaire")
     */
    private $userspartenaires;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comptebank", mappedBy="adminpartenaire")
     */
    private $comptebanks;

    public function __construct()
    {
        $this->userspartenaires = new ArrayCollection();
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

    public function getSuperadmin(): ?superadmin
    {
        return $this->superadmin;
    }

    public function setSuperadmin(?superadmin $superadmin): self
    {
        $this->superadmin = $superadmin;

        return $this;
    }

    /**
     * @return Collection|Userspartenaire[]
     */
    public function getUserspartenaires(): Collection
    {
        return $this->userspartenaires;
    }

    public function addUserspartenaire(Userspartenaire $userspartenaire): self
    {
        if (!$this->userspartenaires->contains($userspartenaire)) {
            $this->userspartenaires[] = $userspartenaire;
            $userspartenaire->setAdminpartenaire($this);
        }

        return $this;
    }

    public function removeUserspartenaire(Userspartenaire $userspartenaire): self
    {
        if ($this->userspartenaires->contains($userspartenaire)) {
            $this->userspartenaires->removeElement($userspartenaire);
            // set the owning side to null (unless already changed)
            if ($userspartenaire->getAdminpartenaire() === $this) {
                $userspartenaire->setAdminpartenaire(null);
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
            $comptebank->setAdminpartenaire($this);
        }

        return $this;
    }

    public function removeComptebank(Comptebank $comptebank): self
    {
        if ($this->comptebanks->contains($comptebank)) {
            $this->comptebanks->removeElement($comptebank);
            // set the owning side to null (unless already changed)
            if ($comptebank->getAdminpartenaire() === $this) {
                $comptebank->setAdminpartenaire(null);
            }
        }

        return $this;
    }
}
