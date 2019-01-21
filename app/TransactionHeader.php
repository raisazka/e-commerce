<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $fillable = [
        'transaction_date', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function transactionDetail(){
        return $this->hasMany('App\TransactionDetail');
    }
}