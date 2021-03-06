<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function accomodations()
    {
        return $this->hasMany(Accomodation::class);
    }

    public function getLists()
    {
        $categories = Category::orderBy('id','asc')->pluck('name', 'id');
        return $categories;
    }
}