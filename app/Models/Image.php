<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Assign the fillable property to the Image model.
    protected $fillable = ['url'];

    // Friendly URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************
     *                Relationships                  *
     *************************************************/

    // Polimorphic relationship
    public function imageable()
    {
        return $this->morphTo();
    }
}
