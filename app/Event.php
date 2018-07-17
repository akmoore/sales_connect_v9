<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'start_date_time', 'end_date_time',
        'type', 'shoot_location', 'prepro_meeting_attendees',
        'email', 'email_list', 'eventable_type', 'eventable_id'
    ];

    //Relationships
    public function eventable(){
        return $this->morphTo();
    }

    public function notes(){
        return $this->morphMany(Note::class);
    }
}
