<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class Invoice extends AbstractWidget
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
        $date = request('date');
        $stock_id = request('id');
        $invoices =  DB::table('invoices')->select('id','invoice_nb','customer_id','total')->where('date','=',$date)->where('stock_id','=',$stock_id)->get();
        $customers =  DB::table('customers')->select('id','name')->get();
        return view('widgets.invoice', [
            'config' => $this->config,
            'customers' => $customers,
            'invoices' => $invoices,
        ]);
    }
}
