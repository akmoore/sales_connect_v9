<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = [
        'project_id', 'length', 'cart_number', 'isci', 'spot_location',
        'music_origin', 'music_track', 'v_o', 'b_roll_source',
        'need_digital_ten_second_preroll', 'is_digital_ten_second_preroll',
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
        return $this->morphMany();
    }
}

