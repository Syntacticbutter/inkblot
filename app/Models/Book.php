<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'edition',
        'author',
        'year',
        'publisher',
        'description'
        // $table->string('title');
        // $table->string('edition');
        // $table->string('author');
        // $table->integer('year');
        // $table->string('publisher');
        // $table->string('description');
    ];
}
