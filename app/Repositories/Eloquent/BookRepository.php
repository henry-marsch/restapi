<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{

    /**
     * BookRepository constructor.
     *
     * @param Book $model
     */
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $pId
     * @param int $isbn
     * @param string $title
     * @param string $author
     * @return Model
     */
    public function create($pId, $isbn, $author, $title): Model
    {
        return $this->model->create([
            'p_Id' => $pId,
            'isbn' => $isbn,
            'author' => $author,
            'title' => $title
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
