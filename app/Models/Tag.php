<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Friendly URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************
     *                Relationships                  *
     *************************************************/

    // Many to many with Posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // One to Many with Color
    public function color(){
        return $this->belongsTo(Color::class);
    }
}
