<?php

namespace App\Entity;

use App\Repository\EuromillionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EuromillionRepository::class)
 */
class Euromillion
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
    private $numbers;

    /**
     * @ORM\OneToMany(targetEntity=StarsEuromillion::class, mappedBy="TirageEuromillion")
     */
    private $starsEuromillions;

    public function __construct()
    {
        $this->starsEuromillions = new ArrayCollection();
    }

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

    public function getNumbers(): ?int
    {
        return $this->numbers;
    }

    public function setNumbers(int $numbers): self
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * @return Collection|StarsEuromillion[]
     */
    public function getStarsEuromillions(): Collection
    {
        return $this->starsEuromillions;
    }

    public function addStarsEuromillion(StarsEuromillion $starsEuromillion): self
    {
        if (!$this->starsEuromillions->contains($starsEuromillion)) {
            $this->starsEuromillions[] = $starsEuromillion;
            $starsEuromillion->setTirageEuromillion($this);
        }

        return $this;
    }

    public function removeStarsEuromillion(StarsEuromillion $starsEuromillion): self
    {
        if ($this->starsEuromillions->contains($starsEuromillion)) {
            $this->starsEuromillions->removeElement($starsEuromillion);
            // set the owning side to null (unless already changed)
            if ($starsEuromillion->getTirageEuromillion() === $this) {
                $starsEuromillion->setTirageEuromillion(null);
            }
        }

        return $this;
    }
}
