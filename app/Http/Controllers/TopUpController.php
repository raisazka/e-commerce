<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopUp;
use Auth;

class TopUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userTopUp(Request $request)
    {
        $topups = TopUp::where('user_id', Auth::user()->id)->first();
        
        if($topups == null){
        $topups = new TopUp;

        $topups->user_id = Auth::user()->id;
        $topups->status = 0;
        $topups->amount = $request->amount;
        $topups->save();
        return back()->with('success', 'Success Add Amount! Wating for verification');
        }else if($topups != null){
        $topups->amount += $request->amount;
        $topups->save();
        return back()->with('success', 'Success Add Amount!');
        }
        
    }
}
