<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BookRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;

class BookController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    /**
     * BookController constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct
    (
        BookRepositoryInterface $bookRepository
    )
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param Request $request
     * @return Model|string
     */
    public function create(Request $request)
    {
        try {
            return $this->bookRepository->create([
                'p_id' => $request->p_id,
                'title' => $request->title,
                'author' => $request->author,
                'isbn' => $request->isbn
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return Collection
     */
    public function list()
    {
        return $this->bookRepository->all();
    }

    /**
     * @param $id
     * @return Model|string
     */
    public function show($id)
    {
        try {
            return $this->bookRepository->find($id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
