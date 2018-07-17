<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];
    protected $with = ['contact', 'roles'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function myRoles(){
        $roles = $this->roles()->get()->map(function($role){return $role->name;});
        if(count($roles) == 1) return $roles->first();
        return $roles;
    }

    //Relationships
    public function contact(){
        return $this->morphOne('App\Contact', 'contactable');
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function acknowledges(){
        return $this->hasMany(Acknowledge::class);
    }

    public function aes(){
        return $this->belongsToMany(User::class, 'ae_manager', 'manager_id', 'ae_id');
    }

    public function manager(){
        return $this->belongsToMany(User::class, 'ae_manager', 'ae_id', 'manager_id');
    }

    // public function agencies(){
    //     return $this->belongsToMany(Business::class)->where('type', 'agency')->get();
    // }

    // public function clients(){
    //     return $this->belongsToMany(Business::class)->where('type', 'client')->get();
    // }
}
