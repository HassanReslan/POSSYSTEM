<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class InvoicesList extends AbstractWidget
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
        //DB::enableQueryLog();
        $date = request('date');
       //$stock_id = request('id');
        if( isset($date) )
        {
            $invoices =  DB::table('invoices')->select('invoices.id','.invoices.invoice_nb','invoices.date','invoices.total','customers.name')
                ->leftJoin('customers','customers.id','=','invoices.customer_id')
                ->orderBy('invoices.id', 'DESC')
                //->where('invoices.date','=', $date)
                ->where('invoices.stock_id','=', $stock_id)
                ->get();

        }
        else{
        $invoices =  DB::table('invoices')->select('invoices.id','.invoices.invoice_nb','invoices.date','invoices.total','customers.name')
            ->leftJoin('customers','customers.id','=','invoices.customer_id')
            //->where('invoices.stock_id','=', $stock_id)
            ->orderBy('invoices.id', 'DESC')
            ->limit(10)
            ->get();
    }


        //dd(DB::getQueryLog());
        return view('widgets.invoices_list', [
            'config' => $this->config,
            'invoices' => $invoices,
        ]);
    }
}
