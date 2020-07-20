<?php

namespace App\Entity;

use App\Repository\LotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Numbers::class, mappedBy="tirage")
     */
    private $numbers;

    /**
     * @ORM\OneToMany(targetEntity=Stars::class, mappedBy="tirage")
     */
    private $stars;

    public function __construct()
    {
        $this->numbers = new ArrayCollection();
        $this->stars = new ArrayCollection();
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

    /**
     * @return Collection|Numbers[]
     */
    public function getNumbers(): Collection
    {
        return $this->numbers;
    }

    public function addNumber(Numbers $number): self
    {
        if (!$this->numbers->contains($number)) {
            $this->numbers[] = $number;
            $number->setTirage($this);
        }

        return $this;
    }

    public function removeNumber(Numbers $number): self
    {
        if ($this->numbers->contains($number)) {
            $this->numbers->removeElement($number);
            // set the owning side to null (unless already changed)
            if ($number->getTirage() === $this) {
                $number->setTirage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Stars[]
     */
    public function getStars(): Collection
    {
        return $this->stars;
    }

    public function addStar(Stars $star): self
    {
        if (!$this->stars->contains($star)) {
            $this->stars[] = $star;
            $star->setTirage($this);
        }

        return $this;
    }

    public function removeStar(Stars $star): self
    {
        if ($this->stars->contains($star)) {
            $this->stars->removeElement($star);
            // set the owning side to null (unless already changed)
            if ($star->getTirage() === $this) {
                $star->setTirage(null);
            }
        }

        return $this;
    }
}
