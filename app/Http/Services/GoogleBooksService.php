<?php


namespace App\Http\Services;

use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class GoogleBooksService
{

    private $httpClient;

    public function __construct
    (
        Client $client
    )
    {
        $this->httpClient = $client;
    }

    public function executeRequest($type, $url)
    {

    }



}
