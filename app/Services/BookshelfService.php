<?php


namespace App\Http\Services;


use Exception;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookshelfService
{
    public function __construct()
    {

    }

    /**
     * @param $title
     * @param $author
     * @param $isbn
     * @param $price
     * @return int|Exception
     */
    public function createBook($title, $author, $isbn, $price)
    {
        try
        {
            return DB::table('books')->insertGetId([
                'title'     => $title,
                'author'    => $author,
                'isbn'      => $isbn,
                'price'     => $price
            ]);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }

    }

    /**
     * List all books
     * @return Collection
     */
    public function getBooks()
    {
        $books = DB::table('books')->get();

        return $books;
    }

    /**
     * Show a specific book by id
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getBook($id)
    {
        $book = DB::table('books')->where('id', $id)->get();

        if($book->isEmpty()) {
            throw new EntityNotFoundException('Book', $id);
        }

        return $book;
    }


    /**
     * @param array $criteria
     * @return Collection
     */
    public function searchBooks($criteria)
    {
        $query = DB::table('books');

        if(array_key_exists('isbn', $criteria) && isset($criteria['isbn']))
        {
            $query->orwhere('isbn', 'like', '%'.$criteria['isbn'].'%');
        }

        if(array_key_exists('title', $criteria) && isset($criteria['title']))
        {
            $query->orWhere('title', 'like', '%'.$criteria['title'].'%');
        }

        return $query->get();
    }

    /**
     * List all authors
     * @return Collection
     */
    public function getAuthors()
    {
        $books = DB::table('authors')->get();

        return $books;
    }

    /**
     * Show a specific author by id
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getAuthor($id)
    {
        $book = DB::table('authors')->where('id', $id)->get();

        if($book->isEmpty())
        {
            throw new EntityNotFoundException('Author', $id);
        }

        return $book;
    }

    /**
     * @param array $criteria
     * @return Collection
     */
    public function searchAuthors($criteria)
    {
        $query = DB::table('authors');

        if(array_key_exists('name', $criteria) && isset($criteria['name']))
        {
            $query->orwhere('name', 'like', '%'.$criteria['name'].'%');
        }

        return $query->get();
    }

    /**
     * List all genres
     * @return Collection
     */
    public function getGenres()
    {
        $genres = DB::table('genres')->get();

        return $genres;
    }

    /**
     * @param array $criteria
     * @return Collection
     */
    public function searchGenres($criteria)
    {
        $query = DB::table('genres');

        if(array_key_exists('name', $criteria) && isset($criteria['name']))
        {
            $query->orwhere('name', 'like', '%'.$criteria['name'].'%');
        }

        return $query->get();
    }

    /**
     * Show a specific genre by id
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getGenre($id)
    {
        $book = DB::table('genres')->where('id', $id)->get();

        if($book->isEmpty()) {
            throw new EntityNotFoundException('Genre', $id);
        }

        return $book;
    }

    /**
     * List authors by book
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getAuthorsByBook($id)
    {
        $authors = DB::table('authors_books')
            ->where('book_id', $id)
            ->leftJoin('authors', 'authors_books.author_id', '=', 'authors.id')
            ->get();

        if($authors->isEmpty())
        {
            throw new EntityNotFoundException('Book', $id);
        }

        return $authors;
    }

    /**
     * List books by author
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getBooksByAuthor($id)
    {
        $authors = DB::table('authors_books')
            ->where('author_id', $id)
            ->leftJoin('books', 'authors_books.book_id', '=', 'books.id')
            ->get();

        if($authors->isEmpty())
        {
            throw new EntityNotFoundException('Author', $id);
        }

        return $authors;
    }

    /**
     * List genres by book
     * @param $id
     * @return Collection
     * @throws EntityNotFoundException
     */
    public function getGenresByBook($id)
    {
        $authors = DB::table('books_genres')
            ->where('book_id', $id)
            ->leftJoin('genres', 'books_genres.genre_id', '=', 'genres.id')
            ->get();

        if($authors->isEmpty())
        {
            throw new EntityNotFoundException('Book', $id);
        }

        return $authors;
    }

}
