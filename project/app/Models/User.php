<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password']; // Add fillable properties

    protected $hidden = ['password', 'remember_token'];

    // Define any relationships, e.g., posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
