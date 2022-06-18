<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    // Friendly URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*********************************************************
     *                     Relationships                     *
     *********************************************************/
    // One to Many Inverse with tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
