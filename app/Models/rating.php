<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    public $table = 'ratings';
    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
