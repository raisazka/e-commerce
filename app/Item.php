<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'description', 'image'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
