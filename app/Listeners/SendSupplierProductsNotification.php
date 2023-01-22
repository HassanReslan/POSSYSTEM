<?php

namespace App\Listeners;

use App\Events\SupplierProducts;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SendSupplierProductsNotification 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SupplierProducts  $event
     * @return void
     */
    public function handle(SupplierProducts $event)
    {
        //print_r($event->supplierid);
        $data = DB::table('supplier_products')->insert(
            [
                'product_id'=> $event->productid,
                'supplier_id'=> $event->supplierid,
                'quantity'=> $event->quantity,
                'sale_price'=>$event->price,
            ],
        );
     }
}
