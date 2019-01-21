<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Category;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNametoStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNametoStore);
        }else{
            $fileNametoStore = 'no-image.jpg';
        }

        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $fileNametoStore;
        $item->save();

        return redirect('/admin/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        $items = Item::findOrFail($item);
        return view('admin.edit', compact('items','item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $items = Item::findOrFail($item->id);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNametoStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNametoStore);
        }else{
            $fileNametoStore = 'no-image.jpg';
        }

        $items->name = $request->name;
        $items->description = $request->description;
        $items->price = $request->price;
        if($items->image != 'no-image.jpg'){
            Storage::delete('public/images/'.$items->image);
        }
        $items->image = $fileNametoStore;
        $items->save();

        return redirect('/admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);

        $items->delete();

        if($items->image != 'no-image.jpg'){
            Storage::delete('public/images/'.$items->image);
        }

        return redirect('/admin/dashboard');
    }
}
