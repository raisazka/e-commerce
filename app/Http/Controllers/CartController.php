<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $duplicates = Cart::where('item_id', $request->item_id)->first();

       if($duplicates == null){
        $carts = new Cart;

        $carts->user_id = Auth::user()->id;
        $carts->item_id = $request->item_id;
        $carts->save();

        return redirect('/cart')->with('success', 'Success Add Item to Cart');

       }else if($duplicates){
        return redirect('/cart')->with('success', 'Item Already in Cart');
       }else{
            $carts = new Cart;
    
            $carts->user_id = Auth::user()->id;
            $carts->item_id = $request->item_id;
            $carts->save();
    
            return redirect('/cart')->with('success', 'Success Add Item to Cart');
       }
        
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $request->id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();
        session()->flash('success', 'Quantity Updated');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();
        return back()->with('success', 'Success Remove Item');
    }

}
