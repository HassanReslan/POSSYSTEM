<?php

namespace App\Listeners;

use App\Events\UpdateStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Stocks;

class UpdateStockNotification
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
     * @param  \App\Events\UpdateStock  $event
     * @return void
     */
    public function handle(UpdateStock $event)
    {
        
        $products = new Stocks;
        $products = Stocks::where('product_id','=',$event->product_id)->first();
        $products->quantity  = $products->quantity - $event->quantity;

        $save = $products->save();
    }
}
