<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function enclosures()
    {
        return $this->hasMany(Enclosure::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}