<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopUp;
use Auth;
use App\Cart;
use App\TransactionHeader;
use App\TransactionDetail;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = TransactionDetail::all();
        return view('admin.transaction.index',compact('transactions'));
    }

    public function buyItem()
    {
        $topup = TopUp::where('user_id', Auth::user()->id)->first();

        $total = 0;
        
        $transaction = new TransactionHeader;

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($carts as $cart) {
           $total += $cart->item->price * $cart->quantity;
        }
        if($topup->amount < $total){
            return back()->with('error', 'Balance not enough');
        }else{
            $transaction->user_id = Auth::user()->id;
            $transaction->save();
            foreach($carts as $cart){
                $transaction->transactionDetail()->create([
                    'qty' => $cart->quantity,
                    'item_id' => $cart->item_id,
                ]);
            }
            
            $topup->amount = $topup->amount - $total;
            $topup->save();

            return redirect('/home')->with('success', 'Success Buy Items!');
        }
    }
}
