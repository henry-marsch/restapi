<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $productRepository;

    public function __construct
    (
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        return $this->productRepository->create($request->all());
    }

}
