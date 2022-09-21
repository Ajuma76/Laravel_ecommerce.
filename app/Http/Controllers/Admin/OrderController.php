<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $oder = Oder::where('status', '0')->get();

        return view('admin.orders.index', compact('oder'));
    }

    public function view($id)
    {
        $orders = Oder::where('id', $id)->first();

        return view('admin.orders.view', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Oder::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();

        return redirect('orders')->with('status', 'Orders Updated successfully');
    }

    public function orderhistory()
    {
        $oder = Oder::where('status', '1')->get();

        return view('admin.orders.orderhistory', compact('oder'));
    }
}
