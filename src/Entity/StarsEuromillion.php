<?php

namespace App\Entity;

use App\Repository\StarsEuromillionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StarsEuromillionRepository::class)
 */
class StarsEuromillion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $star;

    /**
     * @ORM\ManyToOne(targetEntity=Euromillion::class, inversedBy="starsEuromillions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TirageEuromillion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStar(): ?int
    {
        return $this->star;
    }

    public function setStar(int $star): self
    {
        $this->star = $star;

        return $this;
    }

    public function getTirageEuromillion(): ?Euromillion
    {
        return $this->TirageEuromillion;
    }

    public function setTirageEuromillion(?Euromillion $TirageEuromillion): self
    {
        $this->TirageEuromillion = $TirageEuromillion;

        return $this;
    }
}
