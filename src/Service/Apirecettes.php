<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Apirecettes
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchRecettes(): array
    {
        $response = $this->client->request(
            'GET',
            'https://tasty.p.rapidapi.com/recipes/list',
            [
                'query' => [
                    'from' => '0',
                    'size' => '10',
                    'q' => 'cake'
                ],
                'headers' => [
                    'X-RapidAPI-Key' => '53d4f1ce79msh9c676adeb56147ap1cd1a0jsnb0105df3cd49',
	                'X-RapidAPI-Host' => 'tasty.p.rapidapi.com'
                ]
            ],
        );

        $content = $response->getContent();
        $content = $response->toArray();
        
        return $content;
    }
}