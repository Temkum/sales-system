<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(13);

        return view('admin.orders', compact('orders'));
    }

    public function search(Request $request)
    {
        $orders = Order::paginate(13);

        if ($request->input('search')) {
            $orders = $orders->where('name', 'LIKE', '%' . $request->search . '%');
        }

        return view('admin.orders', compact('orders'));
    }

    public function advance(Request $request)
    {
        $orders = Order::paginate(13);

        if ($request->name) {
            $orders = $orders->where('name', 'LIKE', "%" . $request->name . "%");
        }

        if ($request->address) {
            $orders = $orders->where('address', 'LIKE', "%" . $request->address . "%");
        }

        if ($request->min_age && $request->max_age) {
            $orders = $orders->where('age', '>=', $request->min_age)
                ->where('age', '<=', $request->max_age);
        }

        $orders = $orders->paginate(10);

        return view('admin.orders', compact('orders'));
    }
}
