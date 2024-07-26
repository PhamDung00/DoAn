<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    public function year()
    {
        $yearRevenue = Order::selectRaw('YEAR(created_at) as year, SUM(total) as total')
                                ->where('status', 'success')
                                ->groupBy('year')
                                ->get();

        return view('admin.revenue.year', compact('yearRevenue'));
    }

    public function month($year)
    {
        $monthRevenue = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total')
                                ->where('status', 'success')
                                ->whereYear('created_at', $year)
                                ->groupBy('year', 'month')
                                ->get();

        return view('admin.revenue.month', compact('monthRevenue', 'year'));
    }

    public function day($year, $month)
    {
        $dayRevenue = Order::selectRaw('DATE(created_at) as date, SUM(total) as total')
                                ->where('status', 'success')
                                ->whereYear('created_at', $year)
                                ->whereMonth('created_at', $month)
                                ->groupBy('date')
                                ->get();

        return view('admin.revenue.day', compact('dayRevenue', 'year', 'month'));
    }
}
