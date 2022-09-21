<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Oder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $oder = Oder::where('user_id', Auth::id())->get();

        return view('frontend.orders.index', compact('oder'));
    }


    public function view($id)
    {
        $orders = Oder::where('id', $id)->where('user_id', Auth::id())->first();

        return view('frontend.orders.view', compact('orders'));
    }

}
