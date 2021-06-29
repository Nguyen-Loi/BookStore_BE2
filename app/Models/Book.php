<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    public function category()
    {
        return $this->belongsTo(Category::class,'idCategory');
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
