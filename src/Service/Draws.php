<?php

namespace App\Service;


/**
 * Service de base des Tirages
 * @package App\Service
 */
class Draws
{
    /**
     * Pour avoir un tableau de référence des tirages
     * @param $number
     * @return array
     */
    private function countAllNumbers(int $number):array {
        $allNumbers =[];
        for ($i = 1; $i<=$number; $i++) {
            array_push($allNumbers, [$i => 0]);
        }
        return $allNumbers;
    }

    /**
     * Pour avoir un tirage en fonction du nombre de choix et du nombre de chiffre a tirer
     * @param $number
     * @param $numberOfDraw
     * @return array
     */
    private function CreateArrayNum(int $numberOfPossibility, int $numberOfDrawNumber): array
    {
        $resultNumArray = [];
        $lotoNumArray = [];
        for ($i = 0; $i<=$numberOfPossibility; $i++) {
            array_push($lotoNumArray, [$i=>$i+1]);
        }
        array_pop($lotoNumArray);
        for ($j = 0; $j<$numberOfDrawNumber; $j++) {
            $lotoNum = $lotoNumArray[rand(0, $numberOfPossibility - 1)];
            foreach ($lotoNum as $key) {
                if (!in_array($key, $resultNumArray)) {
                    array_push($resultNumArray, $key);
                }
                else{
                    return $this->CreateArrayNum($numberOfPossibility,$numberOfDrawNumber);
                }
            }
        }

        return $resultNumArray;
    }


    /**
     * Pour que le tirage soit aléatoire
     * @param $nmbrTotalChoice
     * @param $nbToDraw
     * @return array
     */
    private function randomize($nmbrTotalChoice, $nbToDraw):array
    {
        $resultLotoNum = $this->CreateArrayNum($nmbrTotalChoice,$nbToDraw);

        return $resultLotoNum;
    }


    /**
     * Pour avoir un nombre donné de tirage
     * @param int $number
     * @param $nmbrTotalChoice
     * @param $nbToDraw
     * @param $nmbrChance
     * @return array
     */
    public function numberOfDrawRender(int $number, int $nbTotalChoice, int $nbToDraw,
                                 int $nbTotalChance, int $nbChanceToDraw ): array
    {
        $arrayResult = [];
        for ( $i = 0 ; $i < $number ; $i++) {
            $completeResult = implode(' ', $this->randomize($nbTotalChoice, $nbToDraw)).' / '.implode(' ', $this->randomize($nbTotalChance,$nbChanceToDraw));
            array_push($arrayResult, $completeResult);
        }
        return $arrayResult;
    }

    /**
     * @param $number
     * @param $arrayToCompare
     * @return array
     */
    public function inArrayNum(int $number, $nbTotalChoice, $nbToDraw, $nbTotalChance, $nbChanceToDraw) {
        $allNumber = $this->countAllNumbers($nbTotalChoice);
        $allNumberChance = $this->countAllNumbers($nbTotalChance);
        $allRawResult = [];
        for ($i= 0; $i<= $number; $i++) {
            $arrayCompare = $this->randomize($nbTotalChoice, $nbToDraw);
            $arrayCompareChance = $this->randomize($nbTotalChance, $nbChanceToDraw);
            $rawResult = implode(' ', $arrayCompare). '/ '. implode( ' ',$arrayCompareChance);
            array_push($allRawResult, $rawResult);
            foreach ($arrayCompare as $key) {
                foreach ($allNumber as $value => $test)
                    if (in_array($key, array_keys($test))) {
                        foreach ($test as $keyToCheck => $valueToChange) {
                            $valueToChange++;
                            $toReplace = [$keyToCheck => $valueToChange];
                            array_push($allNumber, $toReplace);
                            unset($allNumber[$value]);
                        }
                    }
            }
            foreach ($arrayCompareChance as $key) {
                foreach ($allNumberChance as $value => $test)
                    if (in_array($key, array_keys($test))) {
                        foreach ($test as $keyToCheck => $valueToChange) {
                            $valueToChange++;
                            $toReplace = [$keyToCheck => $valueToChange];
                            array_push($allNumberChance, $toReplace);
                            unset($allNumberChance[$value]);
                        }
                    }
            }
        }


        $everything = ['resultNum' => $allRawResult, 'renderNum' => $allNumber, 'renderChance' => $allNumberChance ];
        return $everything;
    }

    public function inArrayChance(int $number, $nbTotalChoiceChance, $nbToDraw) {
        $allNumber = $this->countAllNumbers($nbTotalChoiceChance);
        for ($i= 0; $i<= $number; $i++) {
            $arrayCompare = $this->randomize($nbTotalChoiceChance, $nbToDraw);
            foreach ($arrayCompare as $key) {
                foreach ($allNumber as $value => $test)
                    if (in_array($key, array_keys($test))) {
                        foreach ($test as $keyToCheck => $valueToChange) {
                            $valueToChange++;
                            $toReplace = [$keyToCheck => $valueToChange];
                            array_push($allNumber, $toReplace);
                            unset($allNumber[$value]);
                        }
                    }
            }
        }
        return $allNumber;
    }

//    public function finalResult(int $numberOfDraw, int $nbTotalChoice, int $nbToDraw )
//    {
//    }

//
//    public function numberOfDrawNumBack(int $number, int $nbTotalChoice, int $nbToDraw): array
//    {
//        $arrayResult = [];
//        for ( $i = 0 ; $i < $number ; $i++) {
//            $completeResultNum = $this->randomize($nbTotalChoice, $nbToDraw);
//            array_push($arrayResult, $completeResultNum);
//        }
//
//        return $arrayResult;
//    }


}