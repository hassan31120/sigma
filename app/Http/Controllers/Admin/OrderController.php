<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect(route('admin.orders'))->with('success', 'تم حذف الطلب بنجاح');
    }
}
