<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;



class SupplierProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $supplierid;
   public $productid;
   public $quantity;
   public $price;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($supplierid,$productid,$quantity,$price)
    {
        $this->supplierid = $supplierid;
        $this->productid = $productid;
        $this->quantity = $quantity;
        $this->price = $price;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
