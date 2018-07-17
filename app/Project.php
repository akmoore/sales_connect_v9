<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_will_provide_supporting_materials', 'client_has_provided_all_supporting_materials',
        'missing_supporting_materials', 'acknowledged', 'title', 'slug', 'type', 'start_date',
        'end_date', 'air_start_date', 'expected_finished_edit_date', 'approved_by_client',
        'approved_by_sales_manager', 'script_approved', 'project_fee', 'ready_to_air', 
        'logo_graphic'
    ];

    //Relationships
    public function events(){
        return $this->morphMany(Event::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    public function clients(){
        return $this->belongsToMany(Business::class)->where('type', 'client');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function notes(){
        return $this->morphMany(Note::class);
    }

    public function productions(){
        return $this->hasMany(Production::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }

    public function progress(){
        return $this->hasOne(Progress::class);
    }

    public function approval(){
        return $this->hasOne(Approval::class);
    }
}
