<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Contact extends Model
{
    use Sluggable;

    protected $fillable = [
        'user_id', 'contactable_id', 'contactable_type', 'primary_contact',
        'news_personnel', 'first_name', 'last_name', 'slug', 'email', 'position',
        'work_phone', 'cell_phone', 'birthday', 'start_date_at_company'
    ];

    protected $appends = ['full_name'];

    //Slug
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }

    //Attributes
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    //Rleationships
    public function contactable(){
        return $this->morphTo();
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
