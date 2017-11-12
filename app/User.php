<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function schematics()
{
  return $this->hasMany('App\\Schematic');
}
public function likes()
{
    return $this->hasManyThrough('App\Like', 'App\Schematic');
}
public function views()
{
    return $this->hasManyThrough('App\View', 'App\Schematic');
}
public function downloads()
{
    return $this->hasManyThrough('App\Download', 'App\Schematic');
}
public function socialMedias()
{
    return $this->belongsToMany('App\SocialMedia')->withPivot('handle');
}
/**
 * Get all of the User's Abuse Reports.
 */
public function abuseReports()
{
    return $this->morphMany('App\AbuseReport', 'reportable');
}
}
