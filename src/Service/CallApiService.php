<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

    private $client;

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }


    public function nancyData(): array {

        $response = $this->client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q=nancy&appid=2b5d7c68b1cf6a6a84b459d34407c284&units=metric&lang=fr');

        return $response->toArray();
    }

}