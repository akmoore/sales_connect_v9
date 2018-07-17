<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acknowledge extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'assigned_date',
        'acknowledged_date'
    ];

    //Relationships
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
