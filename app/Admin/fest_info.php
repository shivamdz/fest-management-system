<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class fest_info extends Model
{
    //
    protected $fillable = ['FestName','FestInfo','FestLogo','FestOrg','Total','TotalRegistered'];
}
