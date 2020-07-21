<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\BookRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $bookRepository;

    public function __construct
    (
        BookRepository $bookRepository
    )
    {
        $this->bookRepository = $bookRepository;
    }

    public function create(Request $request)
    {
        return $this->bookRepository->create([
            'p_id' => $request->p_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn
        ]);
    }

    public function list()
    {
        return $this->bookRepository->all();
    }

    public function show($id)
    {
        return $this->bookRepository->find($id);
    }

}
