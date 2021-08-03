<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Accomodation extends Model
{
    use softdeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'category_id', 'summary', 'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
