<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //fillable fields
    protected $fillable = ['EventId', 'EventName','EventDesc',
    'EventStartDate','EventEndDate','EventVenue','Rules','MaxTeam','MaxParti','EventType','Pass','Path'];

    //custom timestamps name
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

}
