<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class CustomersList extends AbstractWidget
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
        $customers = DB::table('customers')->get();
        return view('widgets.customers_list', [
            'config' => $this->config,
            'customers' => $customers,
        ]);
    }
}
