<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class GuestController extends Controller
{
    public function index()
    {
        $items = Item::take(6)->get();
        return view('welcome', compact('items'));
    }
}
