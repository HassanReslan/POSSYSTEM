<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class Settings extends AbstractWidget
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
        $min_stock =  DB::table('stock_settings')->select('min_stock')->where('id','=',1)->get();
        return view('widgets.settings', [
            'config' => $this->config,
            'min_stock' => $min_stock,
        ]);
    }
}
