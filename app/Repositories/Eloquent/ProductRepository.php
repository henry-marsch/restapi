<?php

namespace App\Repositories\Eloquent;

use App\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $name
     * @param int $price
     * @return Model
     */
    public function create($name, $price): Model
    {
        return $this->model->create([
            'name' => $name,
            'price' => $price
        ]);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
