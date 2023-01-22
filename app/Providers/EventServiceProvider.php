<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\ReturnProduct;
use App\Listeners\ReturnProductNotification;
use App\Events\UpdateStock;
use App\Listeners\UpdateStockNotification;
use App\Events\SupplierProducts;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendSupplierProductsNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        SupplierProducts::class=>[
            SendSupplierProductsNotification::class,
        ],

        UpdateStock::class=>[
            UpdateStockNotification::class,
        ],

        ReturnProduct::class=>[
            ReturnProductNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
