<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class InvoiceContent extends AbstractWidget
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
        $invoice_id = request('id');
        //DB::enableQueryLog();
        $invoices_info =  DB::table('content_invoices')->select('content_invoices.product_name','content_invoices.quantity','content_invoices.price','products.product_code','customers.name','invoices.total as total','invoices.date','invoices.invoice_nb')
            ->leftJoin('products','products.id','=','content_invoices.product_id')
            ->leftJoin('invoices','invoices.id','=','content_invoices.invoice_id')
            ->leftJoin('customers','customers.id','=','invoices.customer_id')
            ->where('content_invoices.invoice_id','=',$invoice_id)
            ->get();
        //dd(DB::getQueryLog());
        return view('widgets.invoice_content', [
            'config' => $this->config,
            'invoices_info' => $invoices_info,
        ]);
    }
}
