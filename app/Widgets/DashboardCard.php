<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class DashboardCard extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        $month = date('m');
        $year = date('Y');

      

         $customers = DB::table('customers')->count();
         $products = DB::table('products')->count();
         $users = DB::table('users')->count();
         /*by curent month */
         /*$sales = DB::table('invoices')->whereyear('date','=',$year)->wheremonth('date','=',$month)->sum('total');
         $p_price = DB::table('invoices')->whereyear('date','=',$year)->wheremonth('date','=',$month)->sum('p_total');
         $expenses = DB::table('expenses')->whereyear('date','=',$year)->wheremonth('date','=',$month)->sum('cost_per_dollar');*/

         /*by curent year */
        $sales = DB::table('invoices')->whereyear('date','=',$year)->sum('total');
         $p_price = DB::table('invoices')->whereyear('date','=',$year)->sum('p_total');
         $expenses = DB::table('expenses')->whereyear('date','=',$year)->sum('cost_per_dollar');
         $net = $sales - $p_price;
         $sales = round($sales, 2);

        return view('widgets.dashboard_card', [
            'config' => $this->config,
            'customers' => $customers,
            'products' => $products,
            'users' => $users,
            'sales' => $sales,
            'net' => $net,
            'expenses' => $expenses,
        ]);
    }
}
