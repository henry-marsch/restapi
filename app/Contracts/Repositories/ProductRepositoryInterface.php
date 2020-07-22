<?php
namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends  EloquentRepositoryInterface
{
    /**
     * @param string $name
     * @param int $price
     * @return Model
     */
    public function create($name, $price): Model;

    /**
     * @return Collection
     */
    public function all(): Collection;
}
