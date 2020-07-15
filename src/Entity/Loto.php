<?php

namespace App\Entity;

use App\Repository\LotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotoRepository::class)
 */
class Loto
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
     * @ORM\Column(type="integer")
     */
    private $Chance;

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

    public function getChance(): ?int
    {
        return $this->Chance;
    }

    public function setChance(int $Chance): self
    {
        $this->Chance = $Chance;

        return $this;
    }
}
