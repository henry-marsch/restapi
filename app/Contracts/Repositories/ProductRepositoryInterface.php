<?php
namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends  EloquentRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;
}
