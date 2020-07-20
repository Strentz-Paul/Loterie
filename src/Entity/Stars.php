<?php

namespace App\Entity;

use App\Repository\StarsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StarsRepository::class)
 */
class Stars
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
    private $starNumber;

    /**
     * @ORM\ManyToOne(targetEntity=Loto::class, inversedBy="stars")
     */
    private $tirage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarNumber(): ?string
    {
        return $this->starNumber;
    }

    public function setStarNumber(string $starNumber): self
    {
        $this->starNumber = $starNumber;

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
