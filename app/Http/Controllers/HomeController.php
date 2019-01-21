<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopUp;
use App\Item;
use Auth;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $topup = TopUp::where('user_id', Auth::user()->id)->first();
        return view('home', compact('topup'));
    }
}
