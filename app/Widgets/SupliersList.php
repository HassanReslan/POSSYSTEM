<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class SupliersList extends AbstractWidget
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
         $suppliers = DB::table('supliers')->get();
        return view('widgets.supliers_list', [
            'config' => $this->config,
            'suppliers' => $suppliers,
        ]);
    }
}
