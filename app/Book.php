<?php

namespace App;

class Book extends Product
{

    protected $fillable = [
        'p_Id',
        'isbn',
        'author',
        'title'
    ];

}
