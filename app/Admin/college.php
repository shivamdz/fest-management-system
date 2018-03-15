<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    //
    protected $fillable = ['CId','CName','CCity','CState','CRepName','CNo','CEmail','Status','CTotal'];

    public $timestamps = false;

}
