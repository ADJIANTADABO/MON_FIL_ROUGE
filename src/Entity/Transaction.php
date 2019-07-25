<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
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
    private $code;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEnvoi;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="integer")
     */
    private $gain;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxeEtat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateRetrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\userspartenaire", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userspartenaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\comptebank", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comptebank;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\beneficiaire", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beneficiaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\expediteur", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expediteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTaxeEtat(): ?int
    {
        return $this->taxeEtat;
    }

    public function setTaxeEtat(int $taxeEtat): self
    {
        $this->taxeEtat = $taxeEtat;

        return $this;
    }

    public function getDateRetrait(): ?string
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(string $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getUserspartenaire(): ?userspartenaire
    {
        return $this->userspartenaire;
    }

    public function setUserspartenaire(?userspartenaire $userspartenaire): self
    {
        $this->userspartenaire = $userspartenaire;

        return $this;
    }

    public function getComptebank(): ?comptebank
    {
        return $this->comptebank;
    }

    public function setComptebank(?comptebank $comptebank): self
    {
        $this->comptebank = $comptebank;

        return $this;
    }

    public function getBeneficiaire(): ?beneficiaire
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?beneficiaire $beneficiaire): self
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getExpediteur(): ?expediteur
    {
        return $this->expediteur;
    }

    public function setExpediteur(?expediteur $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }
}
