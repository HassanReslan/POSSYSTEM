<?php

namespace App\Listeners;

use App\Events\ReturnProduct;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Stocks;

class ReturnProductNotification
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
     * @param  \App\Events\ReturnProduct  $event
     * @return void
     */
    public function handle(ReturnProduct $event)
    {
        $products = new Stocks;
        $products = Stocks::where('product_id','=',$event->product_id)->first();
        $products->quantity  = $products->quantity +  $event->quantity;

        $save = $products->save();
    }
}
