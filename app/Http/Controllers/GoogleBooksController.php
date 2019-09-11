<?php

namespace App\Http\Controllers;

use App\Http\Services\GoogleBooksService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use GuzzleHttp\Client;

class GooglebooksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $googleBooksService;

    public function __construct
    (
        GoogleBooksService $googleBooksService
    )
    {
        $this->googleBooksService = $googleBooksService;
    }

    public function test()
    {
        $request = $this->googleBooksService->executeRequest();

        /*$client = new Client();

        $response = $client->request('GET', 'https://www.googleapis.com/books/v1/volumes?q=flowers+inauthor:keyes&key=AIzaSyBNxwtFpP15QJtWHdDrV7F_LaQa5kuiJZM');

        //$statusCode = $response->getStatusCode();

        $body = $response->getBody()->getContents();

        return $body;*/
    }

}
