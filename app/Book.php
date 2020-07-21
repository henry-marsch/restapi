<?php

namespace App;

class Book extends Product
{

    protected $fillable = [
        'p_id',
        'isbn',
        'author',
        'title'
    ];

}
