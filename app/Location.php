<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'locatable_id', 'locatable_type', 'street', 'city',
        'state', 'postal_code', 'phone', 'fax'
    ];

    //Relationships
    public function locatable(){
        return $this->morphTo();
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
