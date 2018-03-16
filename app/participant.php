<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    protected $fillable = ['isPresent'];
    protected $casts = [ 'isPresent' => 'boolean' ];
}
