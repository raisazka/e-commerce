<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $fillable =['user_id', 'admin_id', 'status','amount'];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function admin(){
        return $this->hasMany('App\Admin');
    }
}
