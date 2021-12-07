<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'accomodation_id', 'user_id', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accomodation()
    {
        return $this->belongsTo(Accomodation::class);
    }
}
