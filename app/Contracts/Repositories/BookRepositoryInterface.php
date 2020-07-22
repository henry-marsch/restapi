<?php
namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BookRepositoryInterface extends EloquentRepositoryInterface
{
    /**
     * @param int $pId
     * @param string $title
     * @param string $author
     * @param int $isbn
     * @return Model
     */
    public function create($pId, $title, $author, $isbn): Model;

    /**
     * @return Collection
     */
    public function all(): Collection;
}
