<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        $sales = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $transactions = Order::count();
        $total_revenue = Order::sum('advance');

        $weekly_sales = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->sum('advance');
        $montly_sales = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get()->sum('advance');
        $today_sales = Order::where('created_at', '>=', Carbon::today())->get()->sum('advance');

        // dd($transactions);

        return view(
            'admin.dashboard',
            [
                'users' => $users,
                'roles' => $roles,
                'sales' => $sales,
                'transactions' => $transactions,
                'total_revenue' => $total_revenue,
                'today_sales' => $today_sales,
                'weekly_sales' => $weekly_sales,
                'monthly_sales' => $montly_sales,
            ]
        );
    }

    public function profile()
    {
        return view('admin.profile');
    }
}