<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = ['item_id','transaction_header_id','qty'];

    public function transactonHeader(){
        return $this->belongsTo('App\TransactionHeader');
    }

    public function item(){
        return $this->belongsTo('App\Item', 'item_id');
    }
}
