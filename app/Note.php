<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'notable_id', 'is_description', 'notable_type',
        'note',
    ];

    //Relationships
    public function notable(){
        return $this->morphTo();
    }
}
