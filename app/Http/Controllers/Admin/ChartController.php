<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {

        $user = Auth::user();
        // prendo tuttiglim ordini per mese  
        $sql_query_monthly_orders = 'SELECT COUNT(id) as orders_per_month, created_at FROM orders  WHERE user_id = ' . $user->id . ' GROUP BY month(created_at) ORDER BY created_at DESC';
        // importo tutte le entrate per mese 
        $sql_query_monthly_revenue = 'SELECT  SUM(total_price) as revenue_per_month, created_at FROM orders WHERE user_id = '  . $user->id . ' GROUP BY month(created_at) ORDER BY created_at DESC';

        $user_orders = DB::select($sql_query_monthly_orders);
        $user_revenues = DB::select($sql_query_monthly_revenue);

        $monthly_orders = [];
        $orders_by_month_year = [];
        $monthly_revenue = [];

        foreach($user_orders as $order) {
            $monthly_orders[] = $order->orders_per_month;
            $orders_by_month_year[] = Carbon::create($order->created_at)->format('m/Y');
        }

        foreach($user_revenues as $revenue) {
            $monthly_revenue[] = $revenue->revenue_per_month;
        }

        $chart_types = ['bar', 'line'];

        $data = [
            'user' => $user,
            'chart_types' => $chart_types,
            'monthly_orders' => $monthly_orders,
            'monthly_revenue' => $monthly_revenue,
            'orders_by_month_year' => $orders_by_month_year,
        ];

        return view('admin.statistics', $data);
    }
}
