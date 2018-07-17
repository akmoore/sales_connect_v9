<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Business extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'type', 'url'
    ];

    //Slug
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //Relationships
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function contacts(){
        return $this->morphMany(Contact::class);
    }

    public function locations(){
        return $this->morphMany(Location::class);
    }

    public function clients(){
        return $this->belongsToMany(Business::class, agencies_clients, agency_id, client_id);
    }

    public function agency(){
        return $this->belongsToMany(Business::class, agencies_clients, client_id, agency_id);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function users(){
        return $this->belonsToMany(User::class);
    }
}
