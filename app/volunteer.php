<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class volunteer extends Model
{
    protected $fillable = ['VolId','VolName','VolNo','VolEmail','Event_id'];
}
