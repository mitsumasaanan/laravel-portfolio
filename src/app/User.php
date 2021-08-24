<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Accomodation::class, 'favorites', 'user_id', 'accomodation_id')->withTimestamps();
    }

    public function is_favorite($accomodationId)
    {
        return $this->favorites()->where('accomodation_id', $accomodationId)->exists();
    }

    public function favorite($accomodationId)
    {
        $exist = $this->is_favorite($accomodationId);

        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($accomodationId);
        }
    }
    
    public function unfavorite($accomodationId)
    {
        $exist = $this->is_favorite($accomodationId);

        if ($exist) {
            $this->favorites()->detach($accomodationId);
            return true;
        } else {
            return false;
        }
    }
}
