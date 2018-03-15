<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class event_head extends Model
{
    //
    protected $fillable = ['HeadId','HeadName','HeadNo','HeadEmail','EventId'];


        //custom timestamps name
        // const CREATED_AT = 'created_at';
        // const UPDATED_AT = 'updated_at';
        public $timestamps = false;

}
