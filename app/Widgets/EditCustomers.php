<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class EditCustomers extends AbstractWidget
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
        $customer_id = request('id');
        $customers =  DB::table('customers')->select('id','name','email','phone','address')->where('id','=', $customer_id)->get();
        return view('widgets.edit_customers', [
            'config' => $this->config,
            'customers' => $customers,
        ]);
    }
}
