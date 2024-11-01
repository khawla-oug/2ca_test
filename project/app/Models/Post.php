<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'status', 'category_id']; 

    // pour les relations
    public function category()
    {
        //chaque post appartient à une catégorie
        return $this->belongsTo(Category::class);
    }
}
