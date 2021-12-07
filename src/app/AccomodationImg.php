<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccomodationImg extends Model
{
    protected $fillable = [
        'img_path',
    ];
    
    public function accomodation()
    {
        return $this->belongsTo(Accomodation::class);
    }
}
