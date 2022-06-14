<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /*************************************************
     *                Relationships                  *
     *************************************************/

    // One to many Inverse with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One to many Inverse with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many to many with Tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // One to One Polymorphic with Image
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
