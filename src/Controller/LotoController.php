<?php

namespace App\Controller;

use App\Entity\Draw;
use App\Form\LotoType;
use App\Service\Draws;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/loto", name="loto_")
 */
class LotoController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
        $lotoDraw = new Draw();
        $form = $this->createForm(LotoType::class, $lotoDraw);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nbOfDraws = $form->getData()->getNumberOfDraw() - 1;
            $nbTotalOfChoice = $form->getData()->getNumberTotalOfNum();
            $nbNumberToDraw = $form->getData()->getNbToDraw();
            $nbTotalChance = $form->getData()->getNumberTotalOfChance();
            $nbChanceToDraw = $form->getData()->getNumberTotalOfChanceToDraw();
            $service = new Draws();
            $resultForm = $service->inArrayNum($nbOfDraws, $nbTotalOfChoice,$nbNumberToDraw,$nbTotalChance, $nbChanceToDraw);
            return $this->render('loto/draw.html.twig', [
                'resultDraws' => $resultForm['resultNum'],
            ]);
        }

        return $this->render('loto/index.html.twig', [
            'form' => $form->createView(),
        ]);
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
//            'test'=>$inArray['renderNum'],
//            'chance' => $inArray['renderChance']
        ]);
    }

}
