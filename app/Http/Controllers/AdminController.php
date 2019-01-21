<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Item;
use App\TopUp;
use App\User;
use Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('admin.dashboard', compact('items'));
    }

    public function viewTopUp()
    {
        $topups = TopUp::paginate(10);
        return view('admin.topups', compact('topups'));
    }

    public function verifyTopUp($id)
    {
        $topup = TopUp::findOrFail($id);
        
        $topup->status = 1;
        $topup->admin_id = Auth::user()->id;
        $topup->save();

        return back()->with('success', 'Success Verify');
    }

}