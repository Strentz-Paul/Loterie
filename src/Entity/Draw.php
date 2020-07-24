<?php
namespace App\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class Draw
{
    /**
     * @var int
     */
    private $numberOfDraw;

    /**
     * @var int
     */
    private $numberTotalOfNum;

    /**
     * @var int
     */
    private $nbToDraw;

    /**
     * @var int
     */
    private $numberTotalOfChance;

    /**
     * @var int
     */
    private $numberTotalOfChanceToDraw;

    /**
     * @return int
     */
    public function getNumberOfDraw(): ?int
    {
        return $this->numberOfDraw;
    }

    /**
     * @param int $numberOfDraw
     * @return Draw
     */
    public function setNumberOfDraw(int $numberOfDraw): Draw
    {
        $this->numberOfDraw = $numberOfDraw;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberTotalOfNum(): ?int
    {
        return $this->numberTotalOfNum;
    }

    /**
     * @param int $numberTotalOfNum
     * @return Draw
     */
    public function setNumberTotalOfNum(int $numberTotalOfNum): Draw
    {
        $this->numberTotalOfNum = $numberTotalOfNum;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbToDraw(): ?int
    {
        return $this->nbToDraw;
    }

    /**
     * @param int $nbToDraw
     * @return Draw
     */
    public function setNbToDraw(int $nbToDraw): Draw
    {
        $this->nbToDraw = $nbToDraw;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberTotalOfChance(): ?int
    {
        return $this->numberTotalOfChance;
    }

    /**
     * @param int $numberTotalOfChance
     * @return Draw
     */
    public function setNumberTotalOfChance(int $numberTotalOfChance): Draw
    {
        $this->numberTotalOfChance = $numberTotalOfChance;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberTotalOfChanceToDraw(): ?int
    {
        return $this->numberTotalOfChanceToDraw;
    }

    /**
     * @param int $numberTotalOfChanceToDraw
     * @return Draw
     */
    public function setNumberTotalOfChanceToDraw(int $numberTotalOfChanceToDraw): Draw
    {
        $this->numberTotalOfChanceToDraw = $numberTotalOfChanceToDraw;
        return $this;
    }

}