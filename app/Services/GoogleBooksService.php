<?php


namespace App\Services;

use GuzzleHttp\Client;

class GoogleBooksService
{

    private $httpClient;

    private $apiKey;

    public function __construct
    (
        Client $client
    )
    {
        $this->httpClient = $client;
        $this->apiKey = env('GOOGLE_BOOKS_API_KEY', false);
    }

    public function executeRequest($type, $url)
    {
        $response = $this->httpClient->request($type, $url . '&key=' . $this->apiKey);

        return $response->getBody()->getContents();
    }

}
