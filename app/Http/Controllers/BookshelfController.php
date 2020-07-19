<?php

namespace App\Http\Controllers;

use App\Http\Services\BookshelfService;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
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

    public function createBook(Request $request)
    {
        return $this->bookshelfService->createBook
        (
            $request->title,
            $request->author,
            $request->isbn,
            $request->price
        );
    }

    public function listBooks()
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

    public function searchBooks(Request $request)
    {
        $criteria = [
           'isbn'   => $request->get('isbn'),
           'title'  => $request->get('title')
        ];

        return $this->bookshelfService->searchBooks($criteria);
    }

    public function listAuthors()
    {
        $authors = $this->bookshelfService->getAuthors();

        return $authors;
    }

    public function searchAuthors(Request $request)
    {
        $criteria = [
            'name'   => $request->get('name')
        ];

        $authors = $this->bookshelfService->searchAuthors($criteria);

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

    public function listGenres()
    {
        $genres = $this->bookshelfService->getGenres();

        return $genres;
    }

    public function searchGenres(Request $request)
    {
        $criteria = [
            'name'   => $request->get('name')
        ];

        $authors = $this->bookshelfService->searchGenres($criteria);

        return $authors;
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

    public function listAuthorsByBook($id)
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

    public function listBooksByAuthor($id)
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

    public function listGenresByBook($id)
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
