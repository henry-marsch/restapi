<?php
namespace App\Contracts\Repositories;

use App\Product;
use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;
}
