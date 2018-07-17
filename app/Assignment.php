<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'project_id', 'shooter', 'editor', 'scheduling', 
        'prepro', 'script', 'solo_csp_id'
    ];

    //Relationships
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
