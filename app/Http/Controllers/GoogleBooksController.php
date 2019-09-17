<?php

namespace App\Http\Controllers;

use App\Http\Services\GoogleBooksService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GoogleBooksController extends BaseController
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
        return $this->googleBooksService->executeRequest('GET', 'https://www.googleapis.com/books/v1/volumes?q=flowers+inauthor:keyes');
    }

}
