<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class CreateExpenses extends AbstractWidget
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
        $types =  DB::table('expenses_types')->select('id','type_name')->get();
        return view('widgets.create_expenses', [
            'config' => $this->config,
            'types' => $types,
        ]);
    }
}
