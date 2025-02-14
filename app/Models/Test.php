<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  protected $fillable = [
    'name',
    'email',
    'mobile_no',
    'created_at',
    'updated_at',
  ];
}
