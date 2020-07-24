<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Quote;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\QuoteRepository;
use App\Service\Draws;
use App\Service\QuoteApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, ContactNotification $notification, QuoteRepository $quoteRepo) :Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        $draws = new Draws();
        $arrayResult = $draws->inArrayNum(15, 49,5, 10, 1);


        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);
            $this->addFlash('success', 'Votre message a bien été transmis !');
            return $this->redirectToRoute('index',[
                'form'=>$form->createView(),
                'loto' => $arrayResult['resultNum'],
            ]);
        }

        return $this->render('index/index.html.twig',[
            'form'=>$form->createView(),
            'loto' => $arrayResult['resultNum'],

        ]);
    }

//    private function quote()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $quoteApi = new QuoteApi();
//        $content = $quoteApi->getQuote();
//        $quote = new Quote();
//        $quote->setAuthor('Booba');
//        $quote->setQuote($content['quote']);
//        $em->persist($quote);
//        $em->flush();
//    }

//    /**
//     *@Route("/game", name="game")
//     */
//    public function game()
//    {
//        return $this->render('game/dino.html.twig');
//    }

}
