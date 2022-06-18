<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // mass assignment
    protected $fillable = ['name', 'slug'];

    // Friendly URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************
     *                Relationships                  *
     *************************************************/

    // One to many with Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
