<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'photo', 'nbpages', 'resume', 'price', 'category_id', 'user_id'];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
