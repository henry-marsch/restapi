<?php

namespace App\Repositories\Eloquent;

use App\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
