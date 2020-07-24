<?php


namespace App\Service;

use App\Entity\Quote;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class QuoteApi extends AbstractController
{
    public function getQuote():array
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://api.booba.cloud'
        );
        $statusCode = $response->getStatusCode();
        $content = $response->getContent();
        $content = $response->toArray();

        return $content;
    }

}