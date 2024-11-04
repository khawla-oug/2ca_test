<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Define the fillable properties
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'status', // soit publié ou brouillon
    ];

    // pour les relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
