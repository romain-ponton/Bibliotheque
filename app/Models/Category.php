<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relation avec les livres
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
