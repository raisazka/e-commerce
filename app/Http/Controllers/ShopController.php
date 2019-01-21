<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $items = Item::paginate(12);
        return view('shop.index', compact('items', 'categories'));
    }

    public function showCategories($id)
    {
        $categories = Category::all();
        $items = Item::where('category_id', $id)->paginate(12);
        return view('shop.shop-categories', compact('items', 'categories' ,'id'));
    }

    public function showItem($id)
    {
        $items = Item::findOrFail($id);
        return view('shop.show', compact('items'));
    }
}
