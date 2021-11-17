<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
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
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=TicketPeage::class, mappedBy="voiture")
     */
    private $ticketpeage;

    public function __construct()
    {
        $this->ticketpeage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|TicketPeage[]
     */
    public function getTicketpeage(): Collection
    {
        return $this->ticketpeage;
    }

    public function addTicketpeage(TicketPeage $ticketpeage): self
    {
        if (!$this->ticketpeage->contains($ticketpeage)) {
            $this->ticketpeage[] = $ticketpeage;
            $ticketpeage->setVoiture($this);
        }

        return $this;
    }

    public function removeTicketpeage(TicketPeage $ticketpeage): self
    {
        if ($this->ticketpeage->removeElement($ticketpeage)) {
            // set the owning side to null (unless already changed)
            if ($ticketpeage->getVoiture() === $this) {
                $ticketpeage->setVoiture(null);
            }
        }

        return $this;
    }
}
