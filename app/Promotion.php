<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'project_id', 'length', 'house_number', 'isci',
        'sponsored', 'spot_location', 'music_track',
        'air_date', 'edit_finish_date'
    ];

    //Relationships
    public function events(){
        return $this->morphMany(Event::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function notes(){
        return $this->morphMany(Note::class);
    }
}
