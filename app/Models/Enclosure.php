<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
