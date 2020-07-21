<?php
namespace App\Contracts\Repositories;

use App\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function all(): Collection;
}
