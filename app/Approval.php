<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'project_id', 'status', 'approved_date', 'approved_by',
        'rejected_date', 'rejected_by', 'message'
    ];

    //Relationships
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function notes(){
        return $this->morphMany(Note::class);
    }
}
