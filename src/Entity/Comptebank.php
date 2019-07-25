<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ComptebankRepository")
 */
class Comptebank
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numerocompte;

    /**
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="comptebank")
     */
    private $transactions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\superadmin", inversedBy="comptebanks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adminsystem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\adminpartenaire", inversedBy="comptebanks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adminpartenaire;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerocompte(): ?int
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(int $numerocompte): self
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setComptebank($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getComptebank() === $this) {
                $transaction->setComptebank(null);
            }
        }

        return $this;
    }

    public function getAdminsystem(): ?superadmin
    {
        return $this->adminsystem;
    }

    public function setAdminsystem(?superadmin $adminsystem): self
    {
        $this->adminsystem = $adminsystem;

        return $this;
    }

    public function getAdminpartenaire(): ?adminpartenaire
    {
        return $this->adminpartenaire;
    }

    public function setAdminpartenaire(?adminpartenaire $adminpartenaire): self
    {
        $this->adminpartenaire = $adminpartenaire;

        return $this;
    }
}
