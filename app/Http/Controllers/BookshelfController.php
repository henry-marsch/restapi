<?php

namespace App\Http\Controllers;

use App\Http\Services\BookshelfService;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookshelfController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $bookshelfService;

    public function __construct
    (
        BookshelfService $bookshelfService
    )
    {
        $this->bookshelfService = $bookshelfService;
    }

    public function indexBooks()
    {
        $books = $this->bookshelfService->getBooks();

        return $books;
    }

    public function showBook($id)
    {
        try
        {
            $book = $this->bookshelfService->getBook($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $book;
    }

    public function indexAuthors()
    {
        $authors = $this->bookshelfService->getAuthors();

        return $authors;
    }

    public function showAuthor($id)
    {
        try
        {
            $author = $this->bookshelfService->getAuthor($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $author;
    }

    public function indexGenres()
    {
        $genres = $this->bookshelfService->getGenres();

        return $genres;
    }

    public function showGenre($id)
    {
        try
        {
            $genre = $this->bookshelfService->getGenre($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $genre;
    }

    public function indexAuthorsByBook($id)
    {
        try
        {
            $authors = $this->bookshelfService->getAuthorsByBook($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $authors;
    }

    public function indexBooksByAuthor($id)
    {
        try
        {
            $books = $this->bookshelfService->getBooksByAuthor($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $books;
    }

    public function indexGenresByBook($id)
    {
        try
        {
            $books = $this->bookshelfService->getGenresByBook($id);
        }
        catch(EntityNotFoundException $e)
        {
            return $e->getMessage();
        }

        return $books;
    }
}
