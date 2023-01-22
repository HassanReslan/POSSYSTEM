<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class DailySalesReport extends AbstractWidget
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
        $date = request('year') .'-'. request('month') .'-'. request('day');

        $sales =  DB::table('invoices')
        ->select('invoices.id','invoices.stock_id','.invoices.invoice_nb','invoices.date','invoices.total','invoices.p_total','customers.name','external_stocks.name')
        ->leftJoin('customers','customers.id','=','invoices.customer_id')
        ->leftJoin('external_stocks','external_stocks.id','=','invoices.stock_id')
        ->orderBy('invoices.id', 'DESC')
        ->where('invoices.date','=', $date)
        ->get();

        $byproducts =  DB::table('content_invoices')
        ->leftJoin('invoices','content_invoices.invoice_id','=','invoices.id')
        ->selectRaw('product_name,sum(price) as total,sum(purchasing_price * quantity) as p_total,sum(quantity) as quantity')
        ->where('invoices.date', $date)
        ->groupBy('product_name')
        ->orderBy('quantity', 'DESC')
        ->get()
        ->toArray();

        
        
        return view('widgets.daily_sales_report', [
            'config' => $this->config,
            'sales' => $sales,
            'byproducts'=>$byproducts,
        ]);
    }
}
