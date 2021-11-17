<?php

namespace App\Entity;

use App\Repository\TicketPeageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketPeageRepository::class)
 */
class TicketPeage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomPeage;

    /**
     * @ORM\Column(type="date")
     */
    private $dateticket;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Voiture::class, inversedBy="ticketpeage")
     */
    private $voiture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPeage(): ?string
    {
        return $this->nomPeage;
    }

    public function setNomPeage(string $nomPeage): self
    {
        $this->nomPeage = $nomPeage;

        return $this;
    }

    public function getDateticket(): ?\DateTimeInterface
    {
        return $this->dateticket;
    }

    public function setDateticket(\DateTimeInterface $dateticket): self
    {
        $this->dateticket = $dateticket;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }
}
