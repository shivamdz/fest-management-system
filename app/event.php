<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //fillable fields
    protected $fillable = ['EventId', 'EventName','EventDesc','EventDate',
    'EventStartTime','EventEndTime','EventVenue','Rules','MaxTeam','MaxParti','EventType','Pass','Path'];

    //custom timestamps name
    // const CREATED_AT = 'created';
    // const UPDATED_AT = 'modified';

}
