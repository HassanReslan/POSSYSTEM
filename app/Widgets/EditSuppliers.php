<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class EditSuppliers extends AbstractWidget
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
        $supplier_id = request('id');
        $supplier = DB::table('supliers')->select('*')->where('id','=',$supplier_id)->get();
        return view('widgets.edit_suppliers', [
            'config' => $this->config,
            'supplier' => $supplier ,
        ]);
    }
}
