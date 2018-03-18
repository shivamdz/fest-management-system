<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class fest extends Model
{
    //
    protected $fillable = ['FestName','FestInfo','FestLogo','FestOrg','Total','TotalRegistered'];
}
