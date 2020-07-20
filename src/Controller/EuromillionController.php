<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Draws;

/**
 * @Route("/euromillion", name="euromillion_")
 */
class EuromillionController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('euromillion/index.html.twig');
    }

    /**
     * @Route("/draw", name="draw")
     */
    public function draw()
    {
        $draw = new Draws();
        $inArray = $draw->inArrayNum(15, 50,5, 10, 2);
        //TODO trier le tableau des resultats en fonction nu nombre de fois ou le chiffre est sortie
        return $this->render('euromillion/draw.html.twig',[
            'loto'=> $inArray['resultNum'],
            'test'=>$inArray['renderNum'],
            'chance' => $inArray['renderChance']
        ]);
    }

}
