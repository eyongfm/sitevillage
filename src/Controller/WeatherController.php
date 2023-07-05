<?php

namespace App\Controller;

use DateTime;
use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeatherController extends AbstractController
{

    /**
     * @Route("/weather", name="weather")
     */
    public function index(CallApiService $callApiService): Response
    {
        dump($callApiService->nancyData());

        return $this->render('weather/index.html.twig', [
            'weatherInfo' => $callApiService->nancyData(),
        ]);
    }
}
