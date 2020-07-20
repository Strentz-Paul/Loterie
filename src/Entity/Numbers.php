<?php

namespace App\Entity;

use App\Repository\NumbersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NumbersRepository::class)
 */
class Numbers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity=Loto::class, inversedBy="numbers")
     */
    private $tirage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getTirage(): ?Loto
    {
        return $this->tirage;
    }

    public function setTirage(?Loto $tirage): self
    {
        $this->tirage = $tirage;

        return $this;
    }
}
