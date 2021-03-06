<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Draws;

/**
 * @Route("/loto", name="loto_")
 */
class LotoController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('loto/index.html.twig');
    }

    /**
     * @Route("/draw", name="draw")
     */
    public function draw()
    {
        $draw = new Draws();
        $inArray = $draw->inArrayNum(15, 49,5, 10, 1);
        //TODO trier le tableau des resultats en fonction nu nombre de fois ou le chiffre est sortie
        return $this->render('loto/draw.html.twig',[
            'loto'=> $inArray['resultNum'],
            'test'=>$inArray['renderNum'],
            'chance' => $inArray['renderChance']
        ]);
    }

}
